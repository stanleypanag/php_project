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

<body>

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
            <button type="button" class="btn btn-dark mt-3">
                <a href="/login.php"> Get Started!</a>
            </button>
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
                    $query = mysqli_query($conn, "Select * from list_tbl"); //SQL Query
                    while ($row = mysqli_fetch_array($query)) //Display all the rows from query
                    {
                        print "<tr>";
                        print "<td>" . $row['id'] . "</td>";
                        print "<td>" . $row['details'] . "</td>";
                        print "<td>" . $row['date_posted'] . "-" . $row['date_edited'] . "</td>";
                        print "<td>" . $row['time_posted'] . "-" . $row['time_edited'] . "</td>";
                        print "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <script src="/js/navbar.js">
        myFunction();
    </script>

</body>

</html>