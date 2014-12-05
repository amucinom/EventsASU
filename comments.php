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
					 (comment_id, eid, comment)
					 VALUES ('".$_POST['comment_id']."','".$_POST['eid']."','".$_POST['comment']."')";
			        echo "$sSql <br>";
					mysql_query($sSql);
			        $update = mysql_affected_rows();
				echo "<h2>$update Comment Submitted</h2><br />";
				header("refresh:5;url=viewComments.php");
			}

		?>

		<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

			<!-- <label for="comment_id">Comment ID: </label><input type="text" name="comment_id" /><br /> -->
			<label for="eid">Event ID: </label><input type="text" name="eid" /><br />
			<label for="comment">Comment: </label><textarea type="text" name="comment"></textarea><br />
			<!-- <label for="event_date">Event Date: </label><input type="text" name="event_date" /><br /> -->
			<input class="btn btn-primary" type="submit" name="submit" value="Add Comment" />

		</form>
		<a class="btn btn-primary" href="events.php">Home</a></div>

</body>
</html>


