<?php
class manageAddress
{

  function createTable()
  {
    if($_SESSION['status'] == 100 )
    {
      echo "<table class='table'>";
      echo "<tr>";
        echo "<th> ID</th>";
        echo "<th> Name</th>";
        echo "<th> Location</th>";
        echo "<th> Date</th>";
        echo "<th> Actions </th>";
        if($_SESSION['type']==1) // give delete and update access only to admin users
        {
        echo "<th> DELETE </th>";
        echo "<th> UPDATE </th>";
        }
     echo "</tr>";
  	}
  }

function displayRowEdit($eid, $ename, $elocation, $edate)
{

	    if($_SESSION['status'] == 100 )
	    {
	      // $location = $stn." ".$stname." ". $city." ".  $state." ".$zipcode;


	  	 echo "<tr>";
	     echo "<td> $eid </td>";
	     echo "<td> $ename  </td>";
	     echo "<td> $elocation </td>";
	     echo "<td> $edate </td>";
	     // echo "<td> <a href=\"http://maps.google.com/maps?q=$location\">View on Google Maps</a> </td>";

	        if($_SESSION['type']==1)
	           {
	     echo "<td> <form action=\"delete.php?id=$eid\" method=\"post\">";
	     echo "<input type=\"submit\" value=\"DELETE\" > </form></th>";

	      echo "<td> <form action=\"update.php?id=$eid\" method=\"post\">";
	    echo "<input type=\"submit\" value=\"UPDATE\" > </form></th>";
	         }
	     echo "</tr>";
	  }
}

}
?>
