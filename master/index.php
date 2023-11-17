<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/navbar.css" />
    <link rel="stylesheet" href="./css/home.css" />
    <link rel="stylesheet" href="./css/loader.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>

    <div class="loader-wrapper">
        <img src="./assets/tyga.png" class="loader">
    </div>

    <header>
        <div class="topnav" id="myTopnav">
            <a href="#home" class="active">Home</a>
            <a href="#list">List</a>
            <a href="#about">About</a>
            <a href="#contacts">Contacts</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>

    <section class="section1" id="home">
        <div class="header-title">
            <h1>
                &lt;Darkrant/&gt;
            </h1>

            <h6>"Just No Excuses"</h6>

            <a href="./login.php" class="btn btn-dark mt-3"> Get Started!</a>

        </div>
    </section>

    <section class="section2" id="list" style="text-align: center;">

        <div class="header-list">
            <a href="#list"> List </a>
        </div>

        <div style="margin: 30px; position:relative; top:50px;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Details</th>
                        <th scope="col">Posted Time</th>
                        <th scope="col">Edit Time</th>
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

                    $query = mysqli_query($conn, "SELECT * FROM list_tbl WHERE public = 'yes'"); // SQL Query with condition

                    while ($row = mysqli_fetch_array($query)) {
                        print "<tr>";
                        print "<td>" . $row['id'] . "</td>";
                        print "<td>" . $row['details'] . "</td>";
                        print "<td>" . $row['date_posted'] . "-" . $row['date_edited'] . "</td>";
                        print "<td>" . $row['time_posted'] . "-" . $row['time_edited'] . "</td>";
                        print "</tr>";
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section3" id="about">
        <h1>low</h1>
    </section>

    <script src="./js/navbar.js">
        myFunction();
    </script>

    <script src="./js/loaderDelay.js">

    </script>




</body>

</html>