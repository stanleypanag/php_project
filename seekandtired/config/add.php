<?php

session_start();
if ($_SESSION['user']) {
} else {
    header("location: ../index.php");
}

require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $dateTime = new DateTime();
    $time = $dateTime->format("H:i:s"); //time
    $date = $dateTime->format("F d, Y"); //date
    $decision = "no";

    foreach ($_POST['public'] as &$each_check) //gets the data from the checkbox
    {
        if ($each_check != null) { //checks if checkbox is checked
            $decision = "yes"; // sets the value
        }
    }
    mysqli_query($conn, "INSERT INTO list_tbl(details, date_posted, time_posted,
    public) VALUES ('$details','$date','$time','$decision')"); //SQL query
    header("location: ../home.php");
} else {
    header("location: ../home.php");
}
