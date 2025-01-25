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
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>Booking Confirmation</title>
</head>
<body>
<!-- Header / NAVBAR -->
<header>
    <?php display_header(); ?>
</header>

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
