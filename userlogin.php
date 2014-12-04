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
          echo "Login success, you will be directed to the  AddressBook in 5 seconds";
          header("refresh:5 url= addressbook.php");
        }
       else
        {
       
       setcookie("auth", "0", 0); 
          echo "Login success, you will be directed to the  AddressBook in 5 seconds";
  header("refresh:5 url= addressbook.php");
        }


} else {
	//redirect back to login form if not authorized
	header("Location: userlogin.html");

echo $_POST["username"];
echo $_POST["password"];
	exit;
}
?>
