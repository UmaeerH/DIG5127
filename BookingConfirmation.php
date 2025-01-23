<?php
session_start();
include 'resources/html_construct.php';
?>

<?php
// Include database connection
include "resources/database.php";

if ($conn === null) {
    die("Database connection not established.");
}

// Retrieve data from POST
$roomID = $_POST['roomID'] ?? null;

if ($roomID) {
    // Fetch room details from database
    $query = "SELECT roomName, roomImg FROM rooms WHERE roomID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $roomID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $roomName = $row['roomName'];
        $image = $row['roomImg'];
        $timeSlot = "12:00 - 13:00"; // Dummy time slot
    } else {
        die("Invalid room selected.");
    }
    $stmt->close();
} else {
    die("Room not selected.");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public_html/style/main.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public_html/js/main.js"></script>
    <title>Booking Confirmation</title>
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

    <div class="confirmation-container text-center mt-5">
        <h1>Booking Successful</h1>

        <div class="confirmation-card">
            <div class="room-info">
                <h2 class="room-name"><?= htmlspecialchars($roomName) ?></h2>
                <p class="time-slot2"><?= htmlspecialchars($timeSlot) ?></p>
                <img src="<?= htmlspecialchars($image) ?>" alt="Room Image" class="img-fluid mt-3" style="max-width: 400px;">
            </div>
        </div>

        <div class="action-buttons mt-4">
            <a href="ManageBookings.php" class="btn btn-primary">Manage Bookings</a>
            <a href="BookRooms.php" class="btn btn-primary">Return</a>
        </div>
    </div>

    <!-- Footer -->
    <?php
        display_footer();
    ?>

</body>
</html>
