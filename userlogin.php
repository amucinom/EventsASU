<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ASU Events</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
<?php
include("dbconnect.php");
$con= new dbconnect();
$con->connect();
//create and issue the query
$sql = "SELECT type FROM addressBookUsers WHERE username = '".$_POST["username"]."' AND password = PASSWORD('".$_POST["password"]."')";

$result = mysql_query($sql);

//get the number of rows in the result set; should be 1 if a match
if (mysql_num_rows($result) == 1) {
   $type=0;
	//if authorized, get the values of f_name l_name
      while ($info = mysql_fetch_array($result)) {
	$type =$info['type'];
	}

       if($type == 1)
        {

          setcookie("auth", "1", 0);
          echo "Login success, you will be directed to the ASU Events page in 3 seconds";
          header("refresh:3 url= events.php");
        }
       else
        {

       setcookie("auth", "0", 0);
          echo "Login success, you will be directed to the ASU Events page in 3 seconds";
  header("refresh:3 url= events.php");
        }


} else {
	//redirect back to login form if not authorized
	header("Location: userlogin.html");

echo $_POST["username"];
echo $_POST["password"];
	exit;
}
?>
</body>
</html>
