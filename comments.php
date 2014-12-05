<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ASU Events - Comment on an Event</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container"><?php
			include("dbconnect.php");
			$con= new dbconnect();
			$con->connect();
			if(isset($_POST['submit'])) {
			  $sSql = "INSERT INTO comments
					 (eid, comment)
					 VALUES ('".$_POST['eid']."','".$_POST['comment']."')";
			        echo "$sSql <br>";
				mysqli_query($sSql);
			        $update=mysqli_affected_rows();
				echo "<h2>$update Comment Submitted</h2><br />";
				header("refresh:5;url=viewComments.php");
			}

		?>

		<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

			<label for="eid">Event ID: </label><input type="text" name="eid" /><br />

			<label for="comment">Comment: </label><textarea type="text" name="comment"></textarea><br />
<!-- 			<label for="event_location">Event Location: </label><input type="text" name="event_location" /><br />
			<label for="event_date">Event Date: </label><input type="text" name="event_date" /><br /> -->
			<input class="btn btn-primary" type="submit" name="submit" value="Add Record" />

		</form>
		<a href="events.php">Home</a></div>

</body>
</html>


