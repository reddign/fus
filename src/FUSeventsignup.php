<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Sign Up</title>
    <link rel="stylesheet" href="FUSeventsignup.css">
    <script src="FUSeventsignup.js"></script>
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

    <form>
        <!-- todo: add organization dropdown selector -->
        <div class="dropdown">
            <button onclick="Function()" type="button" class="dropbtn">Organization</button>
            <div id="Dropdown" class="dropdown-content">
                <a href="">Faculty</a>
                <a href="">Local Sports Team</a>
                <a href="">Local Group</a>
                <a href="">Student</a>
                <a href="">School Sports Team</a>
                <a href="">Other</a>
            </div>
        </div>
        <br>

        <!-- todo: find necessary fields to fill in form -->

        <!-- todo: add dropdown menus for location and area -->
        <div class="dropdown">
            <button onclick="Function2()" type="button" class="dropbtn drop">Location</button>
            <div id="Dropdown2" class="dropdown-content">
                <a href="">Auditorium</a>
                <a href="">Cafeteria</a>
                <a href="">Conferance room 1</a>
                <a href="">Conferance room 2</a>
                <a href="">Football Field</a>
                <a href="">Gym</a>
                <a href="">Soccer Field</a>                
            </div>
        </div>
        <br>
        <br>
        <!-- todo: add date/time selectors (link to calendar?) -->
        <p>Select date and start time: <br><input type="datetime-local"/></p>
        <p>Select end time: <br><input type="time"/></p> 

        Repeating Event<input type="checkbox" name="Repeat" id="check"><br>
        <div id="radio">
            How often does this event repeat: <br>
            Daily<input type="radio" name="repeat">
            Weekly<input type="radio" name="repeat">
            Biweekly<input type="radio" name="repeat">
            Monthly<input type="radio" name="repeat">
            Other<input type="checkbox" name="repeat" id="other"> 
            <div id = otherDates>
                <p>Select date and start time: <br><input type="datetime-local"/><br>
                Select end time: <br><input type="time"/></p>

                <button type="button" id="btn">Add another Date</button>
                <hr>
            </div>
            
            <div id = endDate>
                <p>Select end date: <br><input type="date"/></p>
            </div>
        </div>

        <input type="submit" value="Submit">
    </form>
</body>
</html>