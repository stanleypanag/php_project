<?php
session_start(); //starts the session
if ($_SESSION['user']) { //checks if user is logged in
} else {
    header("location: ../index.php"); //redirects if user is not logged in.
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $db_name = "master_db";
    // Create connection
    $conn = mysqli_connect($servername, $username_db, $password_db, $db_name);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if ID is provided via GET or POST
    if (isset($_GET['id'])) {
        $id = $_GET['id']; // Assuming the ID is passed through GET method
        // SQL to delete a record
        $sql = "DELETE FROM list_tbl WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("location: ../home.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "ID not provided";
    }

    // Close the connection
    $conn->close();
}
