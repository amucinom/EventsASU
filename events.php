<?php
session_start();
?>
<html>
<head>
	<title>ASU Events</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1>ASU Events</h1>
	<?php
		if($_SESSION['status']==100)
		{
			include("dbconnect.php");
			include("manageEvent.php");
			$con= new dbconnect();
			$con->connect();
			error_reporting(E_ALL);
			// echo $_SESSION['type'];
			// echo $_SESSION['status'];
			$result = mysql_query("SELECT * FROM events");

			// $event = new manageEvent();
			// $event->createTable();

			// while($row = mysql_fetch_array($result))
			// {
			//     $event->displayRowEdit($row[0], $row[1], $row[2], $row[3]);
			// }
			//
			echo "<table class='table'>";
    echo "<tr>";
      echo "<th> ID</th>";
      echo "<th> Name</th>";
      echo "<th> Location</th>";
      echo "<th> Date</th>";
      echo "<th> Actions</th>";
                  while($row = mysql_fetch_array($result))
            {
                $eid=$row[0];
                $ename=$row[1];
                $elocation=$row[2];
                $edate=$row[3];

                // echo "<table class='table'>";
                echo "<tr>";
                echo "<td> $eid </td>";
                echo "<td> $ename  </td>";
                echo "<td> $elocation </td>";
                echo "<td> $edate </td>";
                echo "<td> <form action=\"delete.php\" target=\"test\" method=\"post\">";
                echo "<input type=\"hidden\" name=\"event_Id\" value=\"$eid\" maxlength=\"60\">";
                echo "<input class='btn btn-danger' name='delete' type=\"submit\" value=\"delete\" > </form>";
                echo "<td><form action='update.php' target='test' method='post'>";
                echo "<input class='btn btn-primary' name='update' type=\"submit\" value=\"update\" > </form></th>";
                echo "<td><form action='comments.php' target='test' method='post'>";
                echo "<input class='btn btn-primary' name='comment' type=\"submit\" value=\"comment\" > </form></th>";
                echo "</tr>";
                // echo "<table>";

            }
      if($_SESSION['type']==1) // give delete and update access only to admin users
      {
      echo "<th> DELETE </th>";
      echo "<th> UPDATE </th>";
      }
   echo "</tr>";


			echo "</table>";
			echo "</center><br><br>";
			echo "<form action=insert.php>";
			echo "<input type = \"submit\" value = \"Add Record\"/></form>";




			echo "<form action=logout.php>";
			echo "<input type = \"submit\" value = \"Logout\"/></form>";
			echo "</body>";
			echo "</html>";

			echo "<a class='btn btn-primary' href='viewComments.php'>View Comments</a>";




		} else {

		   echo "You have logged out";
		   echo "<br> Please re-login. You will be directed to the login page in 5 seconds";
		   header("refresh:5 ; url=userloginses.html");
		}
	?>

	<!-- <div>
		<form action="insert.php">
		        <input class="btn btn-primary" type="submit" value="Add Record"/>
		</form>
	</div> -->

</div>
</body>
</html>