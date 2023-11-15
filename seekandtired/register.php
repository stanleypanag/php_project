<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/login.css" />
</head>

<body>

    <div class="center">

        <div class="arrow">
            <a href="/index.php" style="color: black;">HEEEHHEHE
            </a>
        </div>

        <h1>Register</h1>
        <form action="register.php" method="POST">
            <div class="inputbox">
                <input type="text" name="username" required="required">
                <span>Email</span>
            </div>
            <div class="inputbox">
                <input type="password" name="password" required="required">
                <span>Password</span>
            </div>
            <div class="inputbox">
                <input type="submit" value="Register">
            </div>
            <a href="/login.php" style="color: white;">have an account?</a>
        </form>
    </div>
</body>

</html>

<?php
require_once('./config/registration.php');
?>