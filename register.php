<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>

	<?php
		include("dbconnect.php");
		$con=new dbconnect();
		$con->connect();
		if(isset($_POST['submit'])) {
		       $type=10;

		        if($_POST[type] =="admin")
		        $type = 1;
		       else
		        $type =0;

			$sSql = "INSERT INTO eventUsers
				 ( username, password, email, type)
				 VALUES ('$_POST[username]', PASSWORD(\"$_POST[password]\"), '$_POST[email]', $type)";

			mysql_query($sSql);

			echo '<h2>USER REGISRERED</h2><br />';
			header("refresh:5 ; url=userloginses.html");
		}
?>

</body>
</html>

