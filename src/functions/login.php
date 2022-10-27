<?php
    require "db_functions.php";

    session_start();
    
    $username = isset($_POST)?$_POST["username"]:"";
    $password = isset($_POST)?$_POST["password"]:"";

    $user = authorizeUser($username, $password);
    $_SESSION["loggedIn"] = is_array($user);

    if ($_SESSION["loggedIn"]) {
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["admin"] = $user["admin"];
        header("Location: ../FUShome.php");
    } else {
        echo("not successful");
    }
?>