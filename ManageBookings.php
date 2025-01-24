<?php
include "resources/database.php";
include 'resources/html_construct.php';
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Get the user's ID based on the session username
$userID = null;
$sql = "SELECT userID FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $userID = $user['userID'];
} else {
    echo "User not found.";
    exit;
}

// Handle cancellation of bookings
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_booking'])) {
    $appointmentID = $_POST['appointmentID'];
    $sql = "DELETE FROM appointments WHERE appointmentID = ? AND userID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $appointmentID, $userID);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="nofollow" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public_html/style/main.css">
    <title>Manage Bookings</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-teal">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo" class="OBLogo">
            </a>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="index.php">Home</a>
                <a class="nav-item nav-link" href="BookRooms.php">Book Room</a>
                <a class="nav-item nav-link active" href="ManageBookings.php">Manage Bookings</a>
                <a class="nav-item nav-link" href="AboutUs.php">About Us</a>
                <a class="nav-item nav-link" href="ReportPage.php">Report</a>
                <button onclick="window.location.href='index.php?action=logout'" class="btn btn-primary ml-3">Log Out</button>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4"><?php echo $username; ?>'s Bookings</h2>
        <div class="row">
            <?php
            // Fetch the bookings for the logged-in user
            $sql = "SELECT a.appointmentID, r.roomName, r.roomType, r.floor, r.building, r.roomImg, b.buildingName, a.date, a.timeSlot 
                    FROM appointments a
                    JOIN rooms r ON a.roomID = r.roomID
                    JOIN buildings b ON r.building = b.buildingID
                    WHERE a.userID = ? AND a.cancelled = 0";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $userID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card border-primary">';
                    echo '<img src="' . htmlspecialchars($row['roomImg']) . '" class="card-img-top" alt="Room Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">Room: ' . htmlspecialchars($row['roomName']) . '</h5>';
                    echo '<p class="card-text"><strong>Type:</strong> ' . htmlspecialchars($row['roomType']) . '</p>';
                    echo '<p class="card-text"><strong>Floor:</strong> ' . htmlspecialchars($row['floor']) . '</p>';
                    echo '<p class="card-text"><strong>Building:</strong> ' . htmlspecialchars($row['buildingName']) . '</p>';
                    echo '<p class="card-text"><strong>Date:</strong> ' . htmlspecialchars($row['date']) . '</p>';
                    echo '<p class="card-text"><strong>Time:</strong> ' . htmlspecialchars($row['timeSlot']) . '</p>';
                    echo '<form method="POST">';
                    echo '<input type="hidden" name="appointmentID" value="' . $row['appointmentID'] . '">';
                    echo '<button type="submit" name="cancel_booking" class="btn btn-danger btn-block">Cancel Booking</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">No bookings found.</p>';
            }
            ?>
        </div>
    </div>

    <?php display_footer(); ?>
</body>
</html>
