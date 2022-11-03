<?php
    require_once "functions/db_functions.php";

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="FUSnavbar.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="navbar">
        <div id="banner">
            <h1 id="header">Facility Use System</h1>
        </div>
        <div id="links">
            <a href="FUShome.php">Home</a>
            <a href="FUSlogin.php">Log in</a>
            <a href="FUSeventsignup.php">Event Signup</a>
            <a href="FUScalendar.php">Calendar</a>
            <a href="FUSpricing.php">Pricing</a>
            <?php if(isset($_SESSION["user_id"]) && isAdmin($_SESSION["user_id"])) { ?>
                <a href="FUSapprovereg.php">Approve Accounts</a>
                <a href="FUSreqapproval.php">Approve Events</a>
            <?php } ?>
        </div>
    </div>
</body>
</html>