<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lab 12 - Insert</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container"><?php
			include("dbconnect.php");
			$con= new dbconnect();
			$con->connect();
			if(isset($_POST['submit'])) {
			  $sSql = "INSERT INTO events
					 (event_id, event_name, event_location, event_date)
					 VALUES ('".$_POST['event_id']."','".$_POST['event_name']."', '".$_POST['event_location']."','".$_POST['event_date']."')";
			        echo "$sSql <br>";
				mysql_query($sSql);
			        $update=mysql_affected_rows();
				echo "<h2>$update Record Inserted</h2><br />";
				header("refresh:3\;url=events.php");
			}
		?>

		<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

			<!-- <label for="event_id">Event ID: </label><input type="text" name="event_id" /><br /> -->
			<!-- '".$_POST['event_id']."', -->
			<label for="event_name">Event Name: </label><input type="text" name="event_name" /><br />
			<label for="event_location">Event Location: </label><input type="text" name="event_location" /><br />
			<label for="event_date">Event Date: </label><input type="text" name="event_date" /><br />
			<input class="btn btn-primary" type="submit" name="submit" value="Add Record" />

		</form>
		<a href="events.php">Home</a></div>

</body>
</html>


