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
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $bool = true;
    $query = mysqli_query($conn, "Select * from user_tbl"); //Query the users
    while ($row = mysqli_fetch_array($query)) //Display all rows from query
    {
        $table_users = $row['username']; //the first username row is passed on to $table_users, and so on until the query is finished
        if ($username == $table_users) //checks if there are any matching fields
        {
            $bool = false; //set bool to false
            print '<script>alert("Username is not available!");</script>';
            //Prompt the user
            print '<script>window.location.assign("register.php");</script>';
            //redirects to register.php
        }
    }
    if ($bool) {
        mysqli_query($conn, "INSERT INTO user_tbl (username, password) VALUES
    ('$username','$password')"); //Insert the value to the table users_tbl
        print '<script>alert("Successfully Registered");</script>'; //Prompt the user
        print '<script>window.location.assign("register.php");</script>';
        //redirects to register.php
    }
}
