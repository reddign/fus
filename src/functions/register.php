<?php
    require "db_functions.php";
    session_start();
    
    $username = isset($_POST)?$_POST["username"]:null;
    $password = isset($_POST)?$_POST["password"]:null;
    $c_password = isset($_POST)?$_POST["c_password"]:null;

    $first_name = isset($_POST)?$_POST["first_name"]:null;
    $last_name = isset($_POST)?$_POST["last_name"]:null;

    $address = isset($_POST)?$_POST["address"]:null;
    $city = isset($_POST)?$_POST["city"]:null;
    $state = isset($_POST)?$_POST["state"]:null;
    $zip = isset($_POST)?$_POST["zip"]:null;
    
    $email = isset($_POST)?$_POST["email"]:null;
    $phone = isset($_POST)?$_POST["phone"]:null;
    
    registerUser($username, $password, $c_password, $first_name, $last_name, $address, $city, $state, $zip, $email, $phone);

    header("Location: ../FUSregistermsg.php");

?>