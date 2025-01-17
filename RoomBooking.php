<?php
// Reminder to myself that this retrieves data 
$roomName = $_GET['room_name'] ?? 'Room C218'; // Dummy room name

// more Dummy data to see if this page works
$roomDetails = [
    "Room C218" => [
        "details" => "Classroom, Curzon Level 2",
        "image" => "public_html/images/curson-slider.jpeg",
        "timeSlots" => [
            "09:00 - 11:00" => "booked",
            "11:00 - 12:00" => "available",
            "12:00 - 13:00" => "booked",
        ]
    ],
];

$currentRoom = $roomDetails[$roomName] ?? $roomDetails['Room C218'];
$timeSlots = $currentRoom['timeSlots'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINKS
         Bootstrap CDN -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="public_html/style/main.css">

    <!-- Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public_html/js/main.js"></script>

    <title>Room Booking</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-teal">
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

    <div class="container mt-4">
        <button class="btn btn-secondary mb-3" onclick="history.back()">Back</button>

        <div class="card2">
            <div class="card2-header d-flex justify-content-between align-items-center">
                <div>
                    <h5><?= $roomName ?></h5>
                    <p><?= $currentRoom['details'] ?></p>
                </div>
                <img src="<?= $currentRoom['image'] ?>" alt="Room Image" style="width: 120px; height: 80px; object-fit: cover; border-radius: 8px;">
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
                                    <button class="btn btn-primary btn-sm" name="time_slot" value="<?= $time ?>">Book</button>
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
