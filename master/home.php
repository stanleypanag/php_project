<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/home.css" />
    <link rel="stylesheet" href="./css/loader.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<?php
session_start(); //starts the session
if ($_SESSION['user']) { // checks if the user is logged in
} else {
    header("location: index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>

<body>

    <div class="loader-wrapper">
        <img src="./assets/tyga.png" alt="Loading Icon" class="loader">
    </div>

    <div class="welcome-user">
        <h1>Hello <span style="color: red;"><?php print "$user" ?>!</span></h1>
        <a href="./config/logout.php">Log out</a>
    </div>


    <div class="content mb-5">
        <div class="card">
            <div class="card-body">
                <form action="./config/add.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" style="color: white;">Add more to list:</label>
                        <input type="text" name="details" class="form-control" id="exampleFormControlInput1" placeholder="add details">

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="public[]" value="yes" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault" style="color: white;">
                                Public Post?
                            </label>
                        </div>

                        <button type="submit" value="Add to list" class="btn btn-light mt-5">
                            ADD
                        </button>


                    </div>
                </form>
            </div>
        </div>
    </div>

    <h1 class="my-list-text">My List</h1>

    <div style="margin: 30px; ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Details</th>
                    <th scope="col">Posted Time</th>
                    <th scope="col">Edit Time</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Public Post</th>
                </tr>
            </thead>
            <tbody>

                <?php


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
                $query = mysqli_query($conn, "Select * from list_tbl"); //SQL Query
                while ($row = mysqli_fetch_array($query)) //Display all the rows from query
                {
                    print "<tr>";
                    print "<td>" . $row['id'] . "</td>";
                    print "<td>" . $row['details'] . "</td>";
                    print "<td>" . $row['date_posted'] . "-" . $row['date_edited'] . "</td>";
                    print "<td>" . $row['time_posted'] . "-" . $row['time_edited'] . "</td>";
                    print "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary px-4'>edit</a></td>";
                    print "<td><a href='./config/delete.php?id=" . $row['id'] . "' class='btn btn-danger px-4'>delete</a></td>";
                    print "<td>" . $row['public'] . "</td>";
                    print "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

<script src="./js/loaderDelay.js">

</script>

</html>