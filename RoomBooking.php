<?php
session_start();




// Include database connection
include "resources/database.php";

if ($conn === null) {
    die("Database connection not established.");
}

// Get the selected room ID from the GET request
$roomID = $_GET['roomID'] ?? 0; 

// Query to fetch room details dynamically
$query = "SELECT roomName, roomDesc, roomImg, capacity FROM rooms WHERE roomID = :roomID";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':roomID', $roomID, PDO::PARAM_INT);
$stmt->execute();

// Fetch the room details
$roomDetails = $stmt->fetch(PDO::FETCH_ASSOC);



// Dummy time slots 
$timeSlots = [
    "09:00 - 11:00" => "booked",
    "11:00 - 12:00" => "available",
    "12:00 - 13:00" => "booked",
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- External CSS -->
    <link rel="stylesheet" href="public_html/style/main.css">
    <!-- Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public_html/js/main.js"></script>
    
    <title>Room Booking</title>
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

    <div class="container mt-4">
        <button class="btn btn-secondary mb-3" onclick="history.back()">Back</button>

        <div class="card2">
            <div class="card2-header d-flex justify-content-between align-items-center">
                <div>
                    <h5><?= htmlspecialchars($roomDetails['roomName']) ?></h5>
                    <p><?= htmlspecialchars($roomDetails['roomDesc']) ?></p>
                    <p><strong>Capacity:</strong> <?= htmlspecialchars($roomDetails['capacity']) ?> people</p>
                </div>
                <img src="<?= htmlspecialchars($roomDetails['roomImg']) ?>" alt="Room Image" style="width: 120px; height: 80px; object-fit: cover; border-radius: 8px;">
            </div>

            <div class="card2-body">
                <h6>Times</h6>
                <ul class="list-group">
                    <?php foreach ($timeSlots as $time => $status): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><?= $time ?></span>
                            <?php if ($status === 'booked'): ?>
                                <span class="badge badge-danger">Session Booked</span>
                                <button class="btn btn-secondary btn-sm" disabled>Book</button>
                            <?php else: ?>
                                <span class="badge badge-success">Session Available</span>
                                <form method="POST" action="BookingConfirmation.php">
                               <input type="hidden" name="roomID" value="<?= htmlspecialchars($roomID) ?>">
                               <input type="hidden" name="timeSlot" value="<?= htmlspecialchars($timeSlot) ?>">
                               <button type="submit" class="btn btn-primary mt-2">Book</button>
                               </form>

                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

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
