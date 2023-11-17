<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $db_name = "master_db";

    $conn = mysqli_connect($servername, $username_db, $password_db, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($conn, $_GET['id']); // Escape the input to prevent SQL injection

    // Construct the DELETE query with a parameterized query to ensure the selected ID is deleted
    $sql = "DELETE FROM list_tbl WHERE id = ?";

    // Prepare the DELETE statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // If a row was affected, the deletion was successful
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("location: ../home.php");
            exit();
        } else {
            echo "No records found with the provided ID.";
        }
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Invalid request or missing ID";
}
