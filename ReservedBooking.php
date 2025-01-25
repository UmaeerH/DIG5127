<?php
// this pages Dummy Data
include 'resources/html_construct.php';
$roomName = "Room C218";
$timeSlot = "12:00 - 13:00";
$status = "Session Booked";
$image = "public_html/images/curson-slider.jpeg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>Current Bookings</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo" class="OBLogo">
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
        <h1>Currently Booked By You</h1>

        <div class="confirmation-card">
            <div class="room-info">
                <div class="room-details">
                    <span class="room-name"><?php echo $roomName; ?></span>
                    <span class="time-slot"><?php echo $timeSlot; ?></span>
                    <span class="status"><?php echo $status; ?></span>
                </div>
                <img src="<?php echo $image; ?>" alt="12:00 - 13:00">
            </div>
    </div>


        <div class="action-buttons">
            <a href="#" class="btn manage-btn">Extend Bookings</a>
            <a href="#" class="btn cancel-btn">Cancel Booking</a>
            <a href="RoomSelection.php" class="btn return-btn">Report An Issue</a>
        </div>
    </div>

    <!-- Footer -->
    <?php
        display_footer();
    ?>
    
</body>
</html>
