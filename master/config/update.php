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

        // Form for updating the record
        print '
                        <div class="content mb-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label" style="color: white;">Enter new detail:</label>
                                            <input type="text" name="details" class="form-control" id="exampleFormControlInput1" placeholder="add details">
                            
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" name="public[]" value="yes" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault" style="color: white;">
                                                    Public Post?
                                                </label>
                                            </div>
                            
                                            <input type="hidden" name="update_id" value="' . $id . '">
                                            <!-- Hidden input to pass the ID for updating -->
                            
                                            <button type="submit" value="Update List" class="btn btn-success mt-5">
                                                UPDATE
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ';
    } else {
        $id_exists = false; // Set $id_exists to false if no records found for the ID
    }
}

print '<h1 style="text-align:center;">Review Your Details</h1>';

// Handle form submission for updating the record
if ($id_exists && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $id_to_update = $_POST['update_id']; // Get the ID of the record to be updated
    $new_details = $_POST['details']; // Get the new details to update

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

    // Prepare and execute the SQL UPDATE query
    $sql = "UPDATE list_tbl SET details='$new_details' WHERE id='$id_to_update'";

    if (mysqli_query($conn, $sql)) {
        // Record updated successfully
        echo "Record with ID $id_to_update has been updated.";
        header("location: ./home.php");
        // Redirect or perform other actions after successful update
    } else {
        // Error in updating record
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Close the connection
}
