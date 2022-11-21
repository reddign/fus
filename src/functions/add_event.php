<?php

    class Day {
        public $date;
        public $start_time;
        public $end_time;

        public function __construct($t1, $t2) {
            $temp = explode("T", $t1);

            $this->date = $temp[0];
            $this->start_time = $temp[1];
            $this->end_time = $t2;
        }
    }

    require "db_functions.php";

    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $org = ($_POST["organization"] === "none") ? null : $_POST["organization"];
    $loc = $_POST["location"];

    $days = [];
    $days[] = new Day($_POST["datetime_start_1"], $_POST["datetime_end_1"]);

    if (isset($_POST["Repeat"])) {
        echo $_POST["repeat"]."<br>";

        switch ($_POST["repeat"]) {
            case "other":
                $i = 2;
                while (true) {
                    $start = "datetime_start_".$i;
                    $end = "datetime_end_".$i;

                    if (!isset($_POST[$start])) {
                        break;
                    }

                    $days[] = new Day($_POST[$start], $_POST[$end]);
                    $i++;
                }
                break;
        }
    }

    $db = connect();

    $requestQuery = "INSERT INTO request (user_id, org_id, loc_id, event_name)
                        VALUES (:uid, :oid, :lid, :name);";
    $requestParams = [":uid" => $user_id, ":oid" => $org, ":lid" => $loc, ":name" => $name];

    $stmt = $db->prepare($requestQuery);
    $stmt->execute($requestParams);

    $req_id = $db->lastInsertId();


    $eventQuery = "INSERT INTO event (request_id, start_time, end_time)
                        VALUES (:rid, :st, :end);";
    $eventParams = [":rid" => $req_id, ":st" => null, ":end" => null];

    foreach ($days as $d) {
        $eventParams[":st"] = $d->date."T".$d->start_time;
        $eventParams[":end"] = $d->date."T".$d->end_time;

        $stmt = $db->prepare($eventQuery);
        $stmt->execute($eventParams);
    }
    
    header("Location: ../FUShome.php");

?>