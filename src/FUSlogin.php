<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php include "FUSnavbar.php"?>

    <form method="post" action="functions/login.php">
        <label for="username">Username:</label> <input type="text" name="username"> <br>
        <label for="password">Password:</label> <input type="password" name="password"> <br>
        <input type="submit" value="Login">
    </form>
    Don't have an account? <a href="FUSregistration.php">Register</a> here
</body>
</html>