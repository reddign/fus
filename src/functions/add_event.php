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

    $org = ($_POST["organization"] === "none") ? null : $_POST["organization"];
    $loc = $_POST["location"];

    $days = [];
    $days[] = new Day($_POST["datetime_start_1"], $_POST["datetime_end_1"]);

    if (isset($_POST["repeat"])) {
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

    foreach ($days as $d) {
        echo $d->start_time."<br>";
    }
    

?>