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

    function getPendingRequests() {
        $query = "SELECT * FROM request WHERE processed = 0;";

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $requests = $stmt->fetchAll();

        return $requests;
    }

    function getEvents($request_id) {
        $query = "SELECT * FROM event WHERE request_id = :rid ORDER BY start_time;";
        $params = [":rid" => $request_id];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        $events = $stmt->fetchAll();

        return $events;
    }

    function getLocation($lid) {
        $query = "SELECT * FROM location WHERE loc_id = :lid;";
        $params = [":lid" => $lid];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        $loc = $stmt->fetch(PDO::FETCH_ASSOC);

        return $loc;
    }

    function getUser($uid) {
        $query = "SELECT * FROM user_outside WHERE user_id = :uid;";
        $params = [":uid" => $uid];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    function getEvent($eid) {
        $query = "SELECT * FROM event WHERE event_id = :eid;";
        $params = [":eid" => $eid];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        return $event;
    }
    
    function getRequest($rid) {
        $query = "SELECT * FROM request WHERE request_id = :rid;";
        $params = [":rid" => $rid];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        $request = $stmt->fetch(PDO::FETCH_ASSOC);

        return $request;
    }

    function checkConflict($event_id) {

        $event = getEvent($event_id);
        $request = getRequest($event["request_id"]);

        $query = "  SELECT e.event_id
                    FROM event e
                        JOIN request r ON (e.request_id = r.request_id)
                    WHERE r.loc IN (
                            SELECT loc_2
                            FROM location_dependency
                            WHERE loc_1 = :loc
                        ) AND ((e.start_date BETWEEN :start AND :end)
                            OR (e.end_date BETWEEN :start AND :end)
                            OR (:start BETWEEN e.start_date AND e.end_date));";
        $params = [":loc" => $request["loc_id"], ":start" => $event["start_date"], ":end" => $event["end_date"]];

        $db = connect();
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        $events = $stmt->fetchAll();

        return $events;

    }
?>