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
    <title>Document</title>
</head>
<body>
    <?php include "FUSnavbar.php"?>
    <form method="post" action="functions/approve_users.php">
    <?php
        $users = getUnauthorizedUsers();
        foreach($users as $u) { 
            echo "<input type='checkbox' name='"."approve_".$u["username"]."' value=".$u["user_id"]."> ";
            echo "<label for='"."approve_".$u["username"]."'>";
            echo $u["last_name"].", ".$u["first_name"];
            echo "</label><br>";
        }
    ?><br>
    <input type="submit" id="approve" value="Approve"></input>
    </form>
</body>
</html>