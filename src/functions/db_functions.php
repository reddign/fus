<?php

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
                return $user;
            }
        } 

        return false;
    }
?>