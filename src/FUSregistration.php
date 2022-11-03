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
    <form method="post" action="functions/register.php">
        <label for="username">Username:</label> <input type="text" name="username"> <br>
        <label for="password">Password:</label> <input type="password" name="password"> <br>
        <label for="c_password">Confirm Password:</label> <input type="password" name="c_password"> <br>
        <br>
        <label for="first_name">First Name:</label> <input type="text" name="first_name"> <br>
        <label for="last_name">Last Name:</label> <input type="text" name="last_name"> <br>
        <br>
        <label for="address">Address:</label> <input type="text" name="address"> <br>
        <label for="city">City:</label> <input type="text" name="city"> <br>
        <label for="state">State:</label> <input type="text" name="state"> <br>
        <label for="zip">Zip Code:</label> <input type="text" name="zip"> <br>
        <br>
        <label for="email">Email:</label> <input type="email" name="email"> <br>
        <label for="phone">Phone Number:</label> <input type="tel" name="phone"> <br>

        <!-- find other necessary info for registration -->

        <input type="submit">
    </form>
</body>
</html>