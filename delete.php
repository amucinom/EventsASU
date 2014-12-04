<?php
	include("dbconnect.php");
	$con = new dbconnect();
	$con->connect();

	// echo $_GET['event_Id'];

	// if(isset($_GET['eid'])) {

	// 	$eid =  $_POST['event_Id'];
	//     // $row = mysql_fetch_array($result)
	//    	// $eid = $row[0];
		$sSql = "DELETE FROM events WHERE event_Id=\"$eid\"";
	    echo $sSql;
		$oResult = mysqli_query($sSql);
	    $rows = mysqli_affected_rows();
		echo "<h2> $rows Record(s) Deleted </h2>";
		header("refresh:5;url=events.php");


	// }
?>
<a class="btn btn-primary" href="events.php">Home</a>
