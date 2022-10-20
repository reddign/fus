<?php
    require "db_functions.php";
    session_start();
    
    $username = isset($_POST)?$_POST["username"]:"";
    $password = isset($_POST)?$_POST["password"]:"";
    $c_password = isset($_POST)?$_POST["c_password"]:"";

    $first_name = isset($_POST)?$_POST["first_name"]:"";
    $last_name = isset($_POST)?$_POST["last_name"]:"";

    $address = isset($_POST)?$_POST["address"]:"";
    $city = isset($_POST)?$_POST["city"]:"";
    $state = isset($_POST)?$_POST["state"]:"";
    $zip = isset($_POST)?$_POST["zip"]:"";
    
    $phone = isset($_POST)?$_POST["phone"]:"";
    
    registerUser($username, $password, $c_password, $first_name, $last_name, $address, $city, $state, $zip, $phone);

?>