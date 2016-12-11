<!DOCTYPE html>
<?php $acc=mt_rand(); 
?>

<html lang="en">

<head>

    <!--
    BOOTSTRAP TEMPLATE FROM: https://startbootstrap.com/template-overviews/business-casual/
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BOOTSTRAP TEMPLATE FROM: https://startbootstrap.com/template-overviews/business-casual/">
    <meta name="author" content="">

    <title>MML</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

</head>

</html>



<html lang="en">
<body>
    <div class="brand">MyMovieList</div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MyMovieList</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="myList.php">My List</a>
                    </li>
                    <li>
                        <a href="reviews.php">Reviews</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>


<html lang="en">
<body>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Insert</strong> a Movie/TVShow
                    </h2>
                    <hr>
                    <hr class="visible-xs">
					
					<p><font size="2">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Genre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp; Description</font></p>
	
					<form method="POST" action="index.php">
					<center><p><input type="text" name="MovieName" size="15"><input type ='text' name='Genre' size="15"><input type ="text" name= "Description" size="40"></p><center>     
					<center><p><input type="submit" value="insert Movie" name="insertsubmit"><input type="submit" value="insert TVShow" name="insertTsubmit"></p></center>
					</form>
					
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Remove</strong> Movie/TVShow
                    </h2>
                    <hr>
                    <hr class="visible-xs">
					
					<center><p><font size="2">Movie/TVShow Name</font></p></center>
	
					<center><form method="POST" action="index.php">
					<p><input type="text" name="MovieName" size="50"></p>     
					<center><p><input type="submit" value="Remove Movie" name="RemoveMovie">
					<input type="submit" value="Remove TVShow" name="RemoveTVShow"><p></center>					
					</form></center>
                </div>
            </div>
        </div>	
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                    <strong>Search</strong> by
                    </h2>
                    <hr>
                    <hr class="visible-xs">
					
				<!-- <center><p><font size="2">Name</font></p></center>	-->
					<center><form method="POST" action="index.php">
						<p><input type="text" name="Name1" size="40"></p>  
						<center><p><input type="submit" value="Title" name="SearchName">
						<input type="submit" value="Genre" name="SearchGen">
						<input type="submit" value="Actors/Crew" name="SearchA"></p></center>
						
					</form></center>
                </div>
            </div>
        </div>			
	</div>
	
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>
</html>



<?php

//this tells the system that it's no longer just parsing 
//html; it's now parsing PHP

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
            </div>
            <script>
            $('.error-modal-btn').on('click', function () {
    		$('.error-modal').remove();
			});
			</script>";
}

function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
	global $db_conn, $success;
	$statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

	if (!$statement) {
		$e = OCI_Error($db_conn); // For OCIParse errors pass the       
		// connection handle
		showErrorMsg($cmdstr, $e['message']);
		$success = False;
	}

	$r = OCIExecute($statement, OCI_DEFAULT);
	if (!$r) {
		$e = oci_error($statement); // For OCIExecute errors pass the statementhandle
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
		$acc++;
		$e = OCI_Error($db_conn);
		showErrorMsg($cmdstr, $e['message']);
		$success = False;
	}

	foreach ($list as $tuple) {
		foreach ($tuple as $bind => $val) {
			//echo $val;
			//echo "<br>".$bind."<br>";
			OCIBindByName($statement, $bind, $val);
			unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype

		}
		$r = OCIExecute($statement, OCI_DEFAULT);
		if (!$r) {
			$e = OCI_Error($statement); // For OCIExecute errors pass the statementhandle
			showErrorMsg($cmdstr, $e['message']);
			$success = False;
		}
	}
	$acc=$acc+1;

}

function executeBoundSQL2($cmdstr, $list) {
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
			//echo $val;
			//echo "<br>".$bind."<br>";
			OCIBindByName($statement, $bind, $val);
			unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype

		}
		$r = OCIExecute($statement, OCI_DEFAULT);
		if (!$r) {
			$e = OCI_Error($statement); // For OCIExecute errors pass the statementhandle
			showErrorMsg($cmdstr, $e['message']);
			$success = False;
		}
	}
	return $statement;

}

function printResult($result) { //prints results from a select statement
	//echo "<br>Got data from Movies:<br>";
	echo "<html>";
	echo "<div class='row'>";
    echo "<div class='box'>";
    echo "<div class='col-lg-12'>";
	echo "<center><p><font size='3'>Movies</p></centre>";
	echo "<table bgcolor='#00FF00'>";
	echo "<tr><th>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</th><th>Genre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</th><th>Description</th></tr>";

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td>" . $row[1]. "</td><td>" . $row[2]  . "</td><td>" . $row[3] ."</td></tr>" ; //or just use "echo $row[0]" 
	}
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</html>";
}

function printResultTV($result) { //prints results from a select statement
	//echo "<br>Got data from TVShows:<br>";
	echo "<html>";
	echo "<div class='row'>";
    echo "<div class='box'>";
    echo "<div class='col-lg-12'>";
	echo "<center><p><font size='3'>TV Shows</p></centre>";
	echo "<table bgcolor='#00FF00'>";
	echo "<tr><th>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</th><th>Genre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</th><th>Description</th></tr>";

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td>" . $row[1]. "</td><td>" . $row[2]  . "</td><td>" . $row[3] ."</td></tr>" ; //or just use "echo $row[0]" 
	}
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</html>";
}

function printSearchByGen($result) { 
	echo "<html>";
	echo "<div class='row'>";
    echo "<div class='box'>";
    echo "<div class='col-lg-12'>";
	echo "<center><p><font size='3'>Result of Search</p></centre>";
	echo "<table bgcolor='#00FF00'>";

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td>" . $row[0]. "</td><td>" . $row[2]  . "</td><td>" . $row[3] ."</td></tr>" ; //or just use "echo $row[0]" 
	}
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</html>";
}

if ($db_conn) {
	$acc = $acc +1;
	if(array_key_exists('insertsubmit', $_POST)) {
		if (empty($_POST['MovieName'])||empty($_POST['Genre'])||empty($_POST['Description'])) {
		echo "<center><p>Insert has failed because you did not fill in the required fields<center><p>";
		}
		
		$tuple = array (
			":bind1" => $_POST['MovieID'],
			":bind2" => $_POST['MovieName'],
			":bind3"=> $_POST['Genre'],
			":bind4"=> $_POST['Description']
		);
		$alltuples = array (
		$tuple
		);
		executeBoundSQL("insert into movie values ($acc, :bind2, :bind3, :bind4)" , $alltuples);
		$acc = $acc +1;
		OCICommit($db_conn);
	} else 
		if(array_key_exists('insertTsubmit', $_POST)) {
			if (empty($_POST['MovieName'])||empty($_POST['Genre'])||empty($_POST['Description'])) {
			echo "<center><p>Insert has failed because you did not fill in the required fields<center><p>";
			}
			
			$tuple = array (
				":bind1" => $_POST['MovieID'],
				":bind2" => $_POST['MovieName'],
				":bind3"=> $_POST['Genre'],
				":bind4"=> $_POST['Description']
			);
			$alltuples = array (
			$tuple
			);
			executeBoundSQL("insert into tvshow values ($acc, :bind2, :bind3, :bind4)", $alltuples);
			$acc = $acc +1;
			OCICommit($db_conn);
		} else 
			if(array_key_exists('RemoveMovie', $_POST)) {
				if (empty($_POST['MovieName'])) {
				echo "<center><p>Remove has failed because you did not fill in the required fields<center><p>";
			}
				$tuple = array (
				":bind1" => $_POST['MovieName']);
				$alltuples = array ($tuple);
				executeBoundSQL("delete from movie where name = :bind1 ", $alltuples);
				OCICommit($db_conn);		
			} else 
				if (array_key_exists('RemoveTVShow', $_POST)) {
					if (empty($_POST['MovieName'])) {
					echo "<center><p>Remove has failed because you did not fill in the required fields<center><p>";
				}
					$tuple = array (
					":bind1" => $_POST['MovieName']);
					$alltuples = array ($tuple);
					executeBoundSQL("delete from TVShow where name = :bind1 ", $alltuples);
					OCICommit($db_conn);
				} else 
					if (array_key_exists('SearchGen', $_POST)) {
						$a = '%';
						$tuple = array (
						":bind1" => $_POST['Name1']);
						$tuple[":bind1"] = $a.$tuple[":bind1"].$a;
						$alltuples = array ($tuple);
						echo $tuple[":bind1"]; 
						$result = executeBoundSQL2("select name from movie where genre like :bind1 union select name from tvshow where genre like :bind1", $alltuples);
						//$result = executePlainSQL("select name from movie where genre like 'Action,Adventure,Comedy' union select name from tvshow where genre like 'Action'");
						printSearchByGen($result);
						OCICommit($db_conn);
					} else 
						if (array_key_exists('SearchName', $_POST)) {
							$a = '%';
							$tuple = array (
							":bind1" => $_POST['Name1']);
							$tuple[":bind1"] = $a.$tuple[":bind1"].$a;
							$alltuples = array ($tuple);
							echo $tuple[":bind1"]; 
							$result = executeBoundSQL2("select name from movie where name like :bind1 union select name from tvshow where name like :bind1", $alltuples);
							//$result = executePlainSQL("select name from movie where genre like 'Action,Adventure,Comedy' union select name from tvshow where genre like 'Action'");
							printSearchByGen($result);
							OCICommit($db_conn);
						} else
							if (array_key_exists('SearchA', $_POST)){
								if (empty($_POST['Name1'])) {
								echo "<center><p>Search has failed because you did not fill in the required fields<center><p>";
						}
								$tuple = array (
								":bind1" => $_POST['Name1']);
								$alltuples = array ($tuple);
								$result = executeBoundSQL2("select m.name from movie m, moviesmhave mh, workers w where m.movieid = mh.movieid AND mh.workerid = w.workerid AND w.name = :bind1", $alltuples);
								//$result = executePlainSQL("select name from movie where genre like 'Action,Adventure,Comedy' union select name from tvshow where genre like 'Action'");
								printSearchByGen($result);
								OCICommit($db_conn);	
							}
				
	if ($_POST && $success) {
		//POST-REDIRECT-GET -- See http://en.wikipedia.org/wiki/Post/Redirect/Get	
		header("location: index.php");
		$result = executePlainSQL("select * from movie");
		$resultTV = executePlainSQL("select * from tvshow");
		printResult($result);
		printResultTV($resultTV); 
	} else {
		// Select data...
		$result = executePlainSQL("select * from movie");
		$resultTV = executePlainSQL("select * from tvshow");
		printResult($result);
		printResultTV($resultTV);
	}
		//Commit to save changes...
		OCILogoff($db_conn);
} else {
	echo "cannot connect";
	$e = OCI_Error(); // For OCILogon errors pass no handle
	echo htmlentities($e['message']);		
}
	 
	 
?>
