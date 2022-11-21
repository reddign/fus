<?php
    session_start();

    if(!isset($_SESSION["user_id"])) {
        header("Location: FUShome.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Sign Up</title>
    <link rel="stylesheet" href="FUSeventsignup.css">
    <script src="FUSeventsignup2.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <div id="nav-placeholder"></div>

    <div class="header">
        <h1>Event Sign Up</h1>
    </div>

    <script>
        $(function(){
            $("#nav-placeholder").load("FUSnavbar.php");
        });
        
    </script>

    <form method="post" action="functions/add_event.php">

        <input type="hidden" name="user_id" value=<?php echo $_SESSION["user_id"] ?>>

        <label for="event_name">Event Name: </label>
        <input type="text" id="event_name" name="name" required>
        <br>
        <br>

        <!-- todo: add organization dropdown selector -->
        <label for="org_select">Organization:</label>
        <select id="org_select" name="organization">
            <option value="none"> None </option>
        </select>
        <br>

        <!-- todo: add dropdown menus for location and area -->
        <label for="loc_select">Location:</label>
        <select id="loc_select" name="location" required>
            <option value=""> --- </option>
            <option value="1"> Football Field </option>
        </select>
        <br>
        <br>

        <!-- todo: add date/time selectors (link to calendar?) -->
        <p>Select date and start time: <br><input type="datetime-local" name="datetime_start_1" require/></p>
        <p>Select end time: <br><input type="time" name="datetime_end_1" require/></p> 

        Repeating Event<input type="checkbox" name="Repeat" id="check"><br>

        <div id="repeating">
            <div id="radio">
                How often does this event repeat: <br>
                Daily<input type="radio" name="repeat" value="daily">
                Weekly<input type="radio" name="repeat" value="weekly">
                Biweekly<input type="radio" name="repeat" value="biweekly">
                Monthly<input type="radio" name="repeat" value="monthly">
                Other<input type="radio" name="repeat" value="other"> 
            </div>
            
            <div id="repeatOption">
                <div id = otherDates>
                    <p>Select date and start time: <br><input type="datetime-local" name="datetime_start_2"/><br>
                    Select end time: <br><input type="time" name="datetime_end_2"/></p>

                    <button type="button" id="btn">Add another Date</button>
                    <hr>
                </div>
                
                <div id = endDate>
                    <p>Select end date: <br><input type="date" name="end_date"/></p>
                </div>
            </div>
        </div>

        <input type="submit" value="Submit">
    </form>
</body>
</html>