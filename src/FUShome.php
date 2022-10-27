<?php 
    require "functions/db_functions.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="FUShome.css">
</head>
<body>
    <div class="header">
        <h1>Facility Use System</h1>
    </div>
    <div class="links" id="main-links">
        <h2><a href="FUSlogin.php">Log in</a><br></h2>
        <h2><a href="FUSeventsignup.php">Sign up for an event</a><br></h2>
        <h2><a href="FUScalendar.php">See an event calendar</a><br></h2>
        <h2><a href="FUSpricing.php">Check pricing options</a><br></h2>
    </div>

    <?php if(isset($_SESSION["user_id"]) && isAdmin($_SESSION["user_id"])) { ?>
    <div class="links" id="admin-links">
        <h2><a href="FUSapprovereg.php">Approve new accounts</a><br></h2>
        <h2><a href="FUSreqapproval.php">Approve events</a><br></h2>
    </div>
    <?php } ?>
</body>
</html>