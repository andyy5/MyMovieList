<?php 
$acc = mt_rand();
?>

<?php

$userid = 21; // hardcoded to donald's userId.
$success = True; //keep track of errors so it redirects the page only if there are no errors
$db_conn = OCILogon("ora_r4g9", "a41065137", "ug");

// refer: http://www.w3schools.com/bootstrap/bootstrap_modal.asp
function showErrorMsg($cmd, $err) {
        echo "<div  class='modal fade in error-modal' style='display:block' role='dialog'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h4 class='modal-title'>Error</h4>
                  </div>
                  <div class='modal-body'>
                  <p>" . $cmd . "</p>
                    <p>" . $err ."</p>
                  </div>
                  <div class='modal-footer'>
                    <button class='error-modal-btn' type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                  </div>
                </div>
              </div>
            </div>";
}

function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
	global $db_conn, $success;
	$statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

	if (!$statement) {
		$e = OCI_Error($db_conn);      
		showErrorMsg($cmdstr, $e['message']);
		$success = False;
	}

	$r = OCIExecute($statement, OCI_DEFAULT);

	if (!$r) {
		$e = oci_error($statement);
		showErrorMsg($cmdstr, $e['message']);
		$success = False;
	} else {

	}

	return $statement;

}

function executeBoundSQL($cmdstr, $list) {
	/* Sometimes a same statement will be excuted for severl times, only
	 the value of variables need to be changed.
	 In this case you don't need to create the statement several times; 
	 using bind variables can make the statement be shared and just 
	 parsed once. This is also very useful in protecting against SQL injection. See example code below for       how this functions is used */

	global $db_conn, $success;
	$statement = OCIParse($db_conn, $cmdstr);

	if (!$statement) {
		$e = OCI_Error($db_conn);
		showErrorMsg($cmdstr, $e['message']);
		$success = False;
	}

	foreach ($list as $tuple) {
		foreach ($tuple as $bind => $val) {
			OCIBindByName($statement, $bind, $val);
			unset ($val);

		}
		$r = OCIExecute($statement, OCI_DEFAULT);
		if (!$r) {
			$e = OCI_Error($statement);
			showErrorMsg($cmdstr, $e['message']);
			$success = False;
		}
	}

}

// prints results from a select statement
function printResult($result) {
	echo "<table>";
	echo "<tr><th>Movie</th><th></th><th>Rating</th><th></th><th>Status</th></tr>";

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td>" . $row["NAME"] . "</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>" . $row["RATING"] . "</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>" . $row["STATUS"] . "</td></tr>"; //or just use "echo $row[0]" 
	}
	echo "</table>";

}

function printSingleResult($result, $str) {

	if ($str === 'name') {
		$str = 'Movie';
	}

	echo "<table>";
	echo "<tr><th>" .$str. "</th></tr>";

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td>" . $row[0] . "</td></tr>"; //or just use "echo $row[0]" 
	}
	echo "</table>";

}

function getIdFromMovieName($MovieName) {
	$query = "select movieId from movie where name = '" . $MovieName . "'";
	$result = executePlainSQL($query);
	$row = OCI_Fetch_Array($result, OCI_BOTH);
	$id = $row[0];
	return $id;
}

// mimic console.log()
// http://stackoverflow.com/questions/4323411/how-can-i-write-to-console-in-php
function console_log( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

// Connect Oracle...
if ($db_conn) {

	console_log("start connection");

	if (array_key_exists('btnAdd', $_POST)) {
		$tuple = array (
			":bind1" => getIdFromMovieName($_POST['AddMovieName']),
			":bind2" => $userid,
			":bind3" => $_POST['AddMovieRating'],
			":bind4"=> $_POST['AddMovieStatus']
			);
		$alltuples = array (
			$tuple
			);
		executeBoundSQL("insert into mLists values (:bind1, :bind2, :bind3, :bind4)", $alltuples);
		OCICommit($db_conn);

		if ($success) {
			$result = executePlainSQL("select * from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid);
			printResult($result);
		}

		OCICommit($db_conn);

	} else if (array_key_exists('btnUpdate', $_POST)) {
		$tuple = array (
			":bind1" => getIdFromMovieName($_POST['UpdateMovieName']),
			":bind2" => $userid,
			":bind3" => $_POST['UpdateMovieRating'],
			":bind4"=> $_POST['UpdateMovieStatus']
			);
		$alltuples = array (
			$tuple
			);
		executeBoundSQL("update mLists set rating=:bind3,status=:bind4 where movieid=:bind1 and userid=:bind2", $alltuples);
		OCICommit($db_conn);

		if ($success) {
			$result = executePlainSQL("select * from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid);
			printResult($result);
		}

		OCICommit($db_conn);

	} else if (array_key_exists('btnRemove', $_POST)) {
		$tuple = array (
			":bind1" => getIdFromMovieName($_POST['RemoveMovieName']),
			":bind2" => $userid,
			);
		$alltuples = array (
			$tuple
			);
		executeBoundSQL("delete from mLists where movieid=:bind1 and userid=:bind2", $alltuples);

		OCICommit($db_conn);

		$result = executePlainSQL("select * from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid);
		printResult($result);

		OCICommit($db_conn);

	} else if (array_key_exists('btnFilter', $_POST)) {
		$rating = $_POST['FilterListRating'];
		$status = $_POST['FilterListStatus'];
		$column = $_POST['FilterListColumn'];
		$isProjected = false;

		if (empty($column)) {
			$str = '*';
		} else {
			$str = $column;
			$isProjected = true;
		}

		if (empty($rating) && empty($status)) {
			$result = executePlainSQL("select " .$str." from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid);
		} else if (empty($rating)) {
			$result = executePlainSQL("select " .$str." from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid." and status='".$status."'");
		} else if (empty($status)) {
			$result = executePlainSQL("select " .$str." from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid." and rating='".$rating."'");
		} else {
			$result = executePlainSQL("select " .$str." from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid." and rating='".$rating."' and status='".$status."'");
		}
		if ($isProjected) {
			printSingleResult($result, $str);
		} else {
			printResult($result);
		}

		OCICommit($db_conn);

	} else if (array_key_exists('btnClear', $_POST)) {
		$result = executePlainSQL("select * from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid);
		printResult($result);
		header("Location: ".$_SERVER['PHP_SELF']);
	}

	if ($_POST && $success) {
		console_log(6);
		// header("location: myList.php");
	} else {
		console_log("print");
		// Select data...
		$result = executePlainSQL("select * from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid);
		printResult($result);
	}

	console_log("end connection");
	//Commit to save changes...
	OCILogoff($db_conn);
} else {
	echo "cannot connect";
	$e = OCI_Error(); // For OCILogon errors pass no handle
	echo htmlentities($e['message']);
}

?>
