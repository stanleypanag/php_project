<?php

$servername = "localhost";
$username_db = "root";
$password_db = "";
$db_name = "master_db";
// Create connection
$conn = mysqli_connect(
    $servername,
    $username_db,
    $password_db,
    $db_name
);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
