<?php

$userid = 21;
$db_conn = OCILogon("ora_r4g9", "a41065137", "ug");

// prints results from a select statement
function printStatCountResult($result) {
	echo "<center><div>Number of Entries: ";

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo $row[0];
	}
	echo "</div></center>";

}

function printStatAvgResult($result) {
	echo "<center><div>Average rating: ";

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo $row[0];
	}
	echo "</div></center>";

}

function printStatMaxMoviesResult($result) {
	echo "<center><div>Highest rated movie(s): ";

	$count = 0;

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		if ($count > 0) {
			echo ", ".$row[0];
		} else {
			echo $row[0];
		}
		$count++;
	}
	echo "</div></center>";

}

function printStatMinMoviesResult($result) {
	echo "<center><div>Lowest rated movie(s): ";

	$count = 0;

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		if ($count > 0) {
			echo ", ".$row[0];
		} else {
			echo $row[0];
		}
		$count++;
	}
	echo "</div></center>";

}

function printStatNestedAggResult1($result) {
	echo "<center><div>The max average of movie ratings per status: ";

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo $row[0];
	}
	echo "</div></center>";

}

function printStatNestedAggResult2($result) {
	echo "<center><div>The average # of movies listed per status: ";

	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo $row[0];
	}
	echo "</div></center>";

}

// Connect Oracle...
if ($db_conn) {

	console_log("start connection2");

	console_log("print2");

	$result = executePlainSQL("select COUNT(*) from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid);
	printStatCountResult($result);

	$result = executePlainSQL("select AVG(rating) from mLists, movie where mLists.movieid=movie.movieid and userid=".$userid);
	printStatAvgResult($result);

	$result = executePlainSQL("select name from movie where movieid in (select movieid from mLists where rating=(select max(rating) from mLists where userid=".$userid.") and userid=".$userid.")");
	printStatMaxMoviesResult($result);

	$result = executePlainSQL("select name from movie where movieid in (select movieid from mLists where rating=(select min(rating) from mLists where userid=".$userid.") and userid=".$userid.")");
	printStatMinMoviesResult($result);

	echo "---------------------------------------------";

	$result = executePlainSQL("select max(x.avg) from (select avg(rating) as avg from mlists where userid=".$userid." group by status)x");
	printStatNestedAggResult1($result);

	$result = executePlainSQL("select avg(x.count) from (select count(movieid) as count from mLists where userid=".$userid." group by status)x");
	printStatNestedAggResult2($result);

	console_log("end connection2");
	//Commit to save changes...
	OCILogoff($db_conn);
} else {
	echo "cannot connect";
	$e = OCI_Error(); // For OCILogon errors pass no handle
	echo htmlentities($e['message']);
}

?>