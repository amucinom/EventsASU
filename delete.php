<?php
	include("dbconnect.php");
	$con = new dbconnect();
	$con->connect();

	// echo $_GET['event_Id'];

	// if(isset($_POST['eid'])) {

		$eid =  $_POST['event_Id'];
	//     // $row = mysql_fetch_array($result)
	//    	// $eid = $row[0];
		$sSql = "DELETE FROM events WHERE event_Id=\"$eid\"";
	    echo $sSql;
		$oResult = mysql_query($sSql);
	    $rows = mysql_affected_rows();
		echo "<h2> $rows Record(s) Deleted </h2>";
		header("refresh:3;url=events.php");


	// }
?>
<a class="btn btn-primary" href="events.php">Home</a>
