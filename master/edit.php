<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/navbar.css" />
    <link rel="stylesheet" href="./css/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<?php
session_start(); //starts the session
if ($_SESSION['user']) { //checks if user is logged in
} else {
    header("location: /master/index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>

<body>

    <div class="welcome-user">
        <h1>Hello <span style="color: red;"><?php print "$user" ?>!</span></h1>
        <a href="./config/logout.php">Log out</a>
    </div>


    <a href="./home.php" style="text-decoration: none; color: white;" class="btn btn-dark m-5">
        Go Back
    </a>


    <h1 class="my-list-text">UPDATE</h1>

    <div style="margin: 30px; ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Details</th>
                    <th scope="col">Posted Date</th>
                    <th scope="col">Edit Time</th>
                    <th scope="col">Public Post</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('./config/update.php');
                ?>
            </tbody>

        </table>


    </div>




</body>

</html>