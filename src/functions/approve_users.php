<?php
    require "db_functions.php";

    $users = getUnauthorizedUsers();
    $uid_list = array();

    foreach($users as $u) {
        if(isset($_POST["approve_".$u["username"]])) {
            $uid_list[] = $_POST["approve_".$u["username"]];
        }
    }

    approveUsers($uid_list);
    
?>