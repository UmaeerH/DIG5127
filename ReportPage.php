<?php
session_start();
include 'resources/html_construct.php';
include 'resources/database.php';

// Fetch room details based on roomID from the query string
$roomID = isset($_GET['roomID']) ? intval($_GET['roomID']) : 0;
$userID = $_SESSION['userID'];
$roomDetails = null;
if ($roomID > 0) {
    $sql = "SELECT r.roomName, r.roomType, r.floor, b.buildingName 
            FROM rooms r
            JOIN buildings b ON r.building = b.buildingID
            WHERE r.roomID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $roomID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $roomDetails = $result->fetch_assoc();
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $problemType = $_POST['problem_type'];
    $description = $_POST['description'];
    $dateReported = date('Y-m-d');

    $sql = "INSERT INTO reports (roomID, userID, problem_type, description, date_reported) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisss", $roomID, $userID, $problemType, $description, $dateReported);
    $stmt->execute();
    echo "<script>alert('Thanks for the report'); 
        window.location.href='ManageBookings.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>Report Page</title>
</head>
<body>
    <!-- Header / NAVBAR -->
    <header>
        <?php display_header(); ?>
    </header>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="text-center">Report an Issue</h2>
        <?php if ($roomDetails): ?>
            <p><strong>Problem with the room you selected?:</strong> 
            <?php echo htmlspecialchars($roomDetails['roomName']) . ', '
                . htmlspecialchars($roomDetails['roomType']) . ', ' 
                . htmlspecialchars($roomDetails['buildingName']) 
                . ' - Level ' . htmlspecialchars($roomDetails['floor']); ?>
            </p>
        <?php else: ?>
            <p class="text-center text-danger">Room details not found.</p>
        <?php endif; ?>
        <p>If you are facing an issue with this room, you can choose an option below to describe the problem.</p>
        <p>We will fix the issue as soon as possible and re-arrangements can be made depending on the type of problem.</p>
        

        <!-- Hidden Form -->
        <div class="hidden-form mt-4">
            <h4 class="text-center">Please provide more information about the issue</h4>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="problem_type">Problem Type:</label>
                    <select id="problem_type" name="problem_type" class="form-control" required>
                        <option value="IT">IT Fault</option>
                        <option value="Electrical">Electricity</option>
                        <option value="HVAC">Heating or Air Conditioning</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Describe the issue:</label>
                    <textarea id="description" name="description" class="form-control" rows="4" placeholder="Provide a detailed description of the issue..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block p-3">Submit</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php
        display_footer();
    ?>

</body>
</html>