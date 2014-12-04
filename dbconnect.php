<?php
class dbconnect {
	function connect()
	{
	  $con=mysql_connect("localhost","amucinom","amucinom");
	    if (!$con) {
	       die('Could not connect: ' . mysql_error());
	     }
	   mysql_select_db("amucinom", $con); // your phpMySQL user name
	}
}
?>
