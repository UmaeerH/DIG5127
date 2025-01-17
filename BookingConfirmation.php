<?php
// this pages Dummy Data
$roomName = "Room C218";
$timeSlot = "12:00 - 13:00";
$status = "Session Booked";
$image = "public_html/images/curson-slider.jpeg";
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


    <title>Booking Confirmation</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo">
            </a>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="index.php">Home   </a>
                <a class="nav-item nav-link active" href="BookRooms.php">Book Room</a>
                <a class="nav-item nav-link" href="ManageBookings.php">Manage Bookings  </a>
                <a class="nav-item nav-link" href="AboutUs.php">About Us  </a>
                <a class="nav-item nav-link" href="ReportPage.php">Report  </a>
                <button class="btn btn-primary ml-3">Log Out</button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="confirmation-container">
        <h1>Booking Successful</h1>

        <div class="confirmation-card">
            <div class="room-info">
                <div class="room-details">
                    <span class="room-name"><?php echo $roomName; ?></span>
                    <span class="time-slot2"><?php echo $timeSlot; ?></span>
                    <span class="status"><?php echo $status; ?></span>
                </div>
                <img src="<?php echo $image; ?>" alt="Room Image">
            </div>
        </div>

        <div class="action-buttons">
            <a href="#" class="btn manage-btn">Manage Bookings</a>
            <a href="#" class="btn cancel-btn">Cancel Booking</a>
            <a href="RoomSelection.php" class="btn return-btn">Return</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php">Home</a></li>
                <li class="list-inline-item"><a href="#">Contact Us</a></li>
                <li class="list-inline-item"><a href="#">Legal</a></li>
            </ul>
            <p class="mt-3">OpenBook™ LLC is a registered company in England & Wales under the Companies House.</p>
        </div>
    </footer>
</body>
</html>
