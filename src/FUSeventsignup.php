<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Sign Up</title>
    <link rel="stylesheet" href="FUSeventsignup.css">
    <script src="FUSeventsignup.js"></script>
</head>
<body>
    <div class="header">
        <h1>Event Sign Up</h1>
    </div>

    <form>
        <!-- todo: add organization dropdown selector -->
        <div class="dropdown">
            <button onclick="Function()" type="button" class="dropbtn">Organization</button>
            <div id="Dropdown" class="dropdown-content">
                <a href="">Faculty</a>
                <a href="">Student</a>
                <a href="">Local Sports Team</a>
                <a href="">Other</a>
            </div>
        </div>
        <br>

        <!-- todo: find necessary fields to fill in form -->

        <!-- todo: add dropdown menus for location and area -->
        <div class="dropdown">
            <button onclick="Function2()" type="button" class="dropbtn">Location</button>
            <div id="Dropdown2" class="dropdown-content">
                <a href="">Faculty</a>
                <a href="">Student</a>
                <a href="">Local Sports Team</a>
                <a href="">Other</a>
            </div>
        </div>
        <br>
        <div class="dropdown">
            <button onclick="Function3()" type="button" class="dropbtn">Area</button>
            <div id="Dropdown3" class="dropdown-content">
                <a href="">Faculty</a>
                <a href="">Student</a>
                <a href="">Local Sports Team</a>
                <a href="">Other</a>
            </div>
        </div>
        <!-- todo: add date/time selectors (link to calendar?) -->
        <p>Select date and time: <br><input type="datetime-local"/></p> 
    </form>
</body>
</html>