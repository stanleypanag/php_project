<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./css/login.css" />

    <script src="https://kit.fontawesome.com/1a6b2afab4.js" crossorigin="anonymous"></script>
</head>

<body>



    <div class="center">


        <a href="./index.php" style="text-decoration: none; color:white;">
            <i class="fa-solid fa-arrow-left-long" style="color: white;">
            </i>
            Back to Home
        </a>

        <h1>Login</h1>
        <form action="./config/checkLogin.php" method="POST">
            <div class="inputbox">
                <input type="text" name="username" required="required">
                <span>Email</span>
            </div>
            <div class="inputbox">
                <input type="password" name="password" required="required">
                <span>Password</span>
            </div>
            <div class="inputbox">
                <input type="submit" value="Login">
            </div>
            <a href="./register.php" style="color: white;">create account?</a>
        </form>
    </div>



</body>

</html>



<?php
require_once('./config/checkLogin.php');
?>