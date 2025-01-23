<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINKS
         Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"rel="nofollow" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="public_html/style/main.css">
    <!-- Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public_html/js/main.js"></script>

    <title>Book Rooms</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-teal">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo" class="OBLogo">
            </a>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="index.php">Home</a>
                <a class="nav-item nav-link active" href="BookRooms.php">Book Room</a>
                <a class="nav-item nav-link" href="ManageBookings.php">Manage Bookings</a>
                <a class="nav-item nav-link" href="AboutUs.php">About Us</a>
                <a class="nav-item nav-link" href="ReportPage.php">Report</a>
                <?php if (isset($_SESSION['username'])): ?>
                    <button onclick="window.location.href='index.php?action=logout'" class="btn btn-primary ml-3">Log Out</button>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="text-center">View our selection</h2>
        <p class="text-center">With many buildings to select from across the UK, there are many rooms and workspaces to suit your needs and availability.</p>
        <h3 class="text-center mb-4">Select A Building</h3>
        <div class="row">
            <!-- Building Cards -->
            <?php
            include "resources/database.php";

            if ($conn === null) { 
                die("Database connection not established."); 
            }

            $buildingSql = "SELECT * FROM `buildings`";
            $fetchedBuildings = mysqli_query($conn, $buildingSql);

            foreach ($fetchedBuildings as $building) {
                echo "
                <div class='col-md-3'>
                    <div class='card h-100'>
                        <img class='card-img-top' src='{$building['buildingImg']}' alt='{$building['buildingName']}'>
                        <div class='card-body d-flex flex-column'>
                            <h5 class='card-title'>{$building['buildingName']}</h5>
                            <p class='card-text'>{$building['buildingDesc']}</p>
                            <a href='RoomSelection.php?buildingID={$building['buildingID']}' class='btn btn-primary mt-auto'>Book Now</a>
                        </div>
                    </div>
                </div>
                ";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white text-center py-3 mt-5">
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php" class="text-light">Home</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Contact Us</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Legal</a></li>
            </ul>
            <p class="mt-3">OpenBook™ LLC is a registered company in England & Wales under the Companies House.</p>
        </div>
    </footer>
</body>
</html>
