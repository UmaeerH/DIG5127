<?php
session_start();
?>



<?php
// Dummy Data for the the page Im just testing to see if it works
$timeSlots = [
    "11:00" => "available",
    "12:00" => "selected",
    "13:00" => "available",
    "14:00" => "available",
    "15:00" => "booked",
    "16:00" => "booked",
    "17:00" => "available",
];


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


    <title>Room Selection</title>
</head>

<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-teal">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo" style="height: 80px;">
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
    <div class="container">
        <div class="availability-key">
            <p>
                <span class="key-selected"></span> Selected
                <span class="key-available" ></span> Available
                <span class="key-booked"></span> Fully Booked
            </p>
        </div>

        <div class="row">
            <!-- Calendar Section -->
            <div class="col-md-4 calendar-container">
                <h5>Select a Date and Time</h5>
                <form method="POST" action="RoomSelection.php">
                    <input type="date" name="selected_date" class="form-control" value="2023-08-17">
                    <button type="submit" class="btn btn-primary mt-3">View Times</button>
                </form>
            </div>

            <!-- Time Slots Section -->
            <div class="col-md-4 time-container">
                <h5>Available Time Slots</h5>
                <?php
                foreach ($timeSlots as $time => $status) {
                    $class = $status === 'booked' ? 'time-slot booked' : ($status === 'selected' ? 'time-slot selected' : 'time-slot');
                    echo "<form method='POST' action='RoomSelection.php'>
                            <button name='selected_time' value='$time' class='$class'>$time</button>
                          </form>";
                }
                ?>
            </div>

            <!-- Rooms Section -->
            <div class="col-md-4 room-container">
                <h5>Available Rooms</h5>
            <?php
            include "resources/database.php";

            if ($conn === null) {
                die("Database connection not established.");
            }

            // Retrieve buildingID from the query string
            $buildingID = isset($_GET['buildingID']) ? intval($_GET['buildingID']) : 0;

            if ($buildingID > 0) {
                $roomSql = "SELECT * FROM rooms WHERE building = $buildingID";
                $fetchedRooms = mysqli_query($conn, $roomSql);


                foreach ($fetchedRooms as $room) {
                    $class = 'room-card';
                    $disabled = '';
                    echo "<div class='$class'>
                            <div>
                                <strong>{$room['roomName']}</strong>
                                <p>{$room['roomDesc']}</p>
                                <p>Capacity: {$room['capacity']}</p>
                            </div>
                            <img src='{$room['roomImg']}' alt='{$room['roomName']}'>
                            <form method='GET' action='RoomBooking.php'>
                                <button name='roomID' value='{$room['roomID']}' class='btn btn-primary mt-2' $disabled>Book</button>
                            </form>
                          </div>";
                }
            } else {
                echo "<p class='text-danger'>Invalid building selected.</p>";
            }

            mysqli_close($conn);
            ?>
                
            </div>
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