<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/css/navbar.css" />
    <link rel="stylesheet" href="/css/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<?php
session_start(); //starts the session
if ($_SESSION['user']) { //checks if user is logged in
} else {
    header("location:index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
$id_exists = false;
?>

<body>

    <div class="welcome-user">
        <h1>Hello <?php print "$user" ?>!</h1>
        <a href="./config/logout.php">Log out</a>
    </div>

    <button type="button" class="btn btn-dark m-5">
        <a href="./home.php" style="text-decoration: none; color: white;">
            Go Back
        </a>
    </button>

    <h1 class="my-list-text">My List</h1>

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
                $id_exists = true; // Initialize $id_exists variable

                if (!empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $_SESSION['id'] = $id;

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

                    $query = mysqli_query($conn, "SELECT * FROM list_tbl WHERE id='$id'"); // SQL Query
                    $count = mysqli_num_rows($query);

                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                            // Print table row for each fetched record
                            print "<tr>";
                            print "<td>" . $row['id'] . "</td>";
                            print "<td>" . $row['details'] . "</td>";
                            print "<td>" . $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
                            print "<td>" . $row['date_edited'] . " - " . $row['time_edited'] . "</td>";
                            print "<td>" . $row['public'] . "</td>";
                            print "</tr>";
                        }
                    } else {
                        $id_exists = false; // Set $id_exists to false if no records found for the ID
                    }
                }
                ?>

                <?php
                if ($id_exists) {
                    // Print the form if $id_exists is true
                    print '
                        <div class="content mb-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="edit.php" method="POST">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label" style="color: white;">Enter new detail:</label>
                                            <input type="text" name="details" class="form-control" id="exampleFormControlInput1" placeholder="add details">
                            
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" name="public[]" value="yes" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault" style="color: white;">
                                                    Public Post?
                                                </label>
                                            </div>
                            
                                            <button type="submit" value="Update List" class="btn btn-dark mt-5">
                                                UPDATE
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ';
                } else {
                    print '<h2 align="center">There is no data to be edited.</h2>';
                }
                ?>


            </tbody>

        </table>


    </div>




</body>

</html>