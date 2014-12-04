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
        $con = new dbconnect();
        $con->connect();




        if(isset($_POST['submit'])) {
            $eid = $_POST['event_Id'];
            $ename = $_POST['event_name'];
            $elocation   = $_POST['event_location'];
            $edate = $_POST['event_date'];
            // $email =$_GET['event_Id'];
            // echo $eid . $email;

        //     if (isset($_GET['event_Id'])) {
        // 	$email = $_GET['event_Id'];
        // 	echo "Here is the event ID: " . $email . "\n";
        // }

            $sSql= 'UPDATE events'
        	. ' SET event_name="'.$ename.'", event_location="'.$elocation.'", event_date="'.$edate.'"'
        	. ' WHERE event_Id="'.$eid.'" ';

            echo $sSql;

            mysql_query($sSql);
        }

        if(isset($_GET['event_Id'])) {

            $sSql = "SELECT * FROM events WHERE email='".$_GET['id']."'";

            $oResult = mysql_query($sSql);

            $aRow = mysql_fetch_assoc($oResult);
        }
    ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?id='.$_GET['id']; ?>" >
        <input type="hidden" name="email" value="<?php echo $_GET['id']; ?>" />
        Event ID:<input type="text" name="event_Id" value="<?php echo $aRow['event_Id']; ?>"><br>
        Event Name:<input type="text" name="event_name" value="<?php echo $aRow['event_name']; ?>" /><br />
        Event Location:<input type="text" name="event_location" value="<?php echo $aRow['event_location']; ?>" /><br />
        Event Date:<input type="text" name="event_date" value="<?php echo $aRow['event_date']; ?>" /><br />

        <input type="hidden" name="oldemail" value="<?php echo $aRow['username']; ?>" /><br/>
        <input type="submit" name="submit" value="Update Item" />

    </form>
<a href="events.php">Home</a>

</body>
</html>


