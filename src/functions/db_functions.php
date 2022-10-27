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

        $query = "SELECT * FROM user_outside WHERE username = :u";
        $params = [":u" => $u];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(is_array($user) && isset($user["password"])) {
            if($user["password"] == $p) {
                if($user["approved"] != 0) {
                    return $user;
                }
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
?>