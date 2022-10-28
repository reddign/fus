<?php
    require "config.php";

    function connect() {
        global $database,$databasehost,$databaseuser,$databasepassword;
        $dsn = "mysql:host=$databasehost;dbname=$database;charset=UTF8";
        $pdo = new PDO($dsn, $databaseuser, $databasepassword);
        return $pdo;
    }


    function authorizeUser($u, $p) {
        #TODO: PASSWORD ENCRYPTION 
        $p_encrypted = $p; 

        $query = "SELECT * FROM user_outside WHERE username = :u AND password = :p;";
        $params = [":u" => $u, ":p" => $p];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(is_array($user)) {
            if($user["approved"]) {
                return $user;
            }
        } 

        return false;
    }


    function registerUser($u, $p, $cp, $fn, $ln, $ad, $ct, $st, $zp, $em, $ph) {
        if ($p != $cp) { return false; }

        $query = "INSERT INTO user_outside (username, password, approved, first_name, last_name, address, city, state, zip, email, phone) 
            VALUES (:u, :p, 0, :fn, :ln, :ad, :ct, :st, :zp, :em, :ph);";
        $params = [":u" => $u, ":p" => $p, ":fn" => $fn, ":ln" => $ln, ":ad" => $ad, ":ct" => $ct, ":st" => $st, ":zp" => $zp, ":em" => $em, ":ph" => $ph];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        
        return true;
    }


    function isAdmin($uid) {

        $query = "SELECT admin FROM user_outside WHERE user_id = :uid;";
        $params = [":uid" => $uid];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user["admin"];

    }


    function getUnauthorizedUsers() {
        $query = "SELECT * FROM user_outside WHERE approved = 0;";

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $users = $stmt->fetchAll();

        return $users;
    }


    function approveUsers($uids) {
        $query = "UPDATE user_outside SET approved = 1 WHERE user_id = :uid;";

        $db = connect();

        foreach($uids as $uid) {
            $params = [":uid" => $uid];

            $stmt = $db->prepare($query);
            $stmt->execute($params);
        }
    }
?>