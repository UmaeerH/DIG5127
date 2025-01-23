<?php
session_start();

include "resources/database.php";
include 'resources/html_construct.php';

if ($conn === null) {
    die("Database connection not established.");
}

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Get the selected room ID from POST or GET
$roomID = $_POST['room_id'] ?? $_GET['room_id'] ?? null;
if (!$roomID) {
    die("Room ID is missing. Please go back and select a room.");
}

$roomID = intval($roomID);

// Fetch room details
$query = "SELECT roomName, roomDesc, roomImg, capacity FROM rooms WHERE roomID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $roomID);
$stmt->execute();
$result = $stmt->get_result();
$roomDetails = $result->fetch_assoc();

if (!$roomDetails) {
    die("Invalid room ID.");
}




// Fetch available time slots for the selected date
$selectedDate = $_SESSION['selected_date'] ?? date('Y-m-d');
$timeSlotsQuery = "SELECT timeSlot FROM appointments WHERE roomID = ? AND date = ? AND cancelled = 0";
$timeStmt = $conn->prepare($timeSlotsQuery);
$timeStmt->bind_param("is", $roomID, $selectedDate);
$timeStmt->execute();
$timeResult = $timeStmt->get_result();
$bookedSlots = [];
while ($row = $timeResult->fetch_assoc()) {
    $bookedSlots[] = $row['timeSlot'];
}

// Define all time slots
$allTimeSlots = [
    "09:00 - 10:00", "10:00 - 11:00", "11:00 - 12:00", "12:00 - 13:00", "13:00 - 14:00", "14:00 - 15:00", "15:00 - 16:00", "16:00 - 17:00"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="public_html/style/main.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Room Booking</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-teal">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo">
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
            <h6>Available Times</h6>
            <ul class="list-group">
                <?php foreach ($allTimeSlots as $timeSlot): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><?= $timeSlot ?></span>
                        <?php if (in_array($timeSlot, $bookedSlots)): ?>
                            <span class="badge badge-danger">Session Booked</span>
                            <button class="btn btn-secondary btn-sm" disabled>Book</button>
                        <?php else: ?>
                            <span class="badge badge-success">Session Available</span>
                            <form method="POST" action="BookingConfirmation.php">
                                <input type="hidden" name="roomID" value="<?= htmlspecialchars($roomID) ?>">
                                <input type="hidden" name="timeSlot" value="<?= htmlspecialchars($timeSlot) ?>">
                                <input type="hidden" name="selected_date" value="<?= htmlspecialchars($selectedDate) ?>">
                                <button type="submit" class="btn btn-primary btn-sm">Book</button>
                            </form>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Footer -->
    <?php
        display_footer();
    ?>
</body>
</html>