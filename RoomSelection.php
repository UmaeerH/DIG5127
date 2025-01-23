<?php
session_start();

include "resources/database.php";

if ($conn === null) {
    die("Database connection not established.");
}

function getComputerCount($conn, $roomID) {
    $query = "SELECT COUNT(*) as num_computers FROM computers c JOIN equipment e ON c.equipmentID = e.equipmentID WHERE e.designatedRoom = $roomID AND e.status = 'Operational'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['num_computers'] ?? 0;
}

function isRoomFavored($conn, $roomID, $userID) {
    $query = "SELECT * FROM favourites WHERE userID = $userID AND roomID = $roomID";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}

// Determine the building ID
$buildingId = $_POST['building_id'] ?? $_GET['buildingID'] ?? null;
if (!$buildingId) {
    die("<p class='text-danger'>Building ID is missing. Please select a building to view rooms.</p>");
}

$buildingId = intval($buildingId);

// Save selected date and time to session for future use
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selected_date'])) {
        $_SESSION['selected_date'] = $_POST['selected_date'];
    }
    if (isset($_POST['selected_time'])) {
        $_SESSION['selected_time'] = $_POST['selected_time'];
    }
}

// Fetching available software
$softwareOptions = "";
$softwareQuery = "SELECT * FROM software";
$softwareResult = mysqli_query($conn, $softwareQuery);
while ($software = mysqli_fetch_assoc($softwareResult)) {
    $softwareOptions .= "<option value='{$software['softwareID']}'>{$software['name']}</option>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="public_html/style/main.css">
    <script src="public_html/js/main.js"></script>
    <title>Room Selection</title>
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
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5>Select Filters</h5>
            <form method="POST" action="RoomSelection.php">
                <input type="hidden" name="building_id" value="<?php echo htmlspecialchars($buildingId); ?>">
                <input type="date" name="selected_date" class="form-control" value="<?php echo $_SESSION['selected_date'] ?? date('Y-m-d'); ?>">
                <input type="number" name="min_seats" class="form-control mt-3" placeholder="Minimum Seats">
                <input type="number" name="min_computers" class="form-control mt-3" placeholder="Minimum Computers">
                <select name="software" class="form-control mt-3">
                    <option value="">Select Software</option>
                    <?php echo $softwareOptions; ?>
                </select>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" name="microphone" id="microphone">
                    <label class="form-check-label" for="microphone">Microphone</label>
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" name="smartboard" id="smartboard">
                    <label class="form-check-label" for="smartboard">Smartboard</label>
                </div>
                <div class="form-check mt-3">
                    <label><b>Room Type</b></label><br>
                    <input class="form-check-input" type="radio" name="room_type" id="classroom" value="Classroom">
                    <label class="form-check-label" for="classroom">Classroom</label><br>
                    <input class="form-check-input" type="radio" name="room_type" id="hall" value="Hall">
                    <label class="form-check-label" for="hall">Hall</label><br>
                    <input class="form-check-input" type="radio" name="room_type" id="lab" value="Lab">
                    <label class="form-check-label" for="lab">Lab</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Search</button>
            </form>
        </div>

        <div class="col-md-8">
            <h5>Available Rooms</h5>
            <?php
            $filters = "WHERE building = $buildingId";

            if (!empty($_POST['min_seats'])) {
                $filters .= " AND capacity >= " . intval($_POST['min_seats']);
            }

            if (!empty($_POST['min_computers'])) {
                $filters .= " AND EXISTS (
                    SELECT 1 FROM equipment e 
                    JOIN computers c ON e.equipmentID = c.equipmentID
                    WHERE e.designatedRoom = rooms.roomID AND e.status = 'Operational'
                    HAVING COUNT(*) >= " . intval($_POST['min_computers']) . ")";
            }

            if (!empty($_POST['software'])) {
                $softwareID = intval($_POST['software']);
                $filters .= " AND EXISTS (
                    SELECT 1 FROM equipment e
                    JOIN computers c ON e.equipmentID = c.equipmentID
                    JOIN computer_software cs ON c.computerID = cs.computerID
                    WHERE e.designatedRoom = rooms.roomID AND cs.softwareID = $softwareID
                )";
            }

            if (isset($_POST['microphone']) || isset($_POST['smartboard'])) {
                $filters .= " AND (EXISTS (
                    SELECT 1 FROM equipment e
                    JOIN microphone m ON e.equipmentID = m.equipmentID
                    WHERE e.designatedRoom = rooms.roomID AND e.status = 'Operational'
                ) OR EXISTS (
                    SELECT 1 FROM equipment e
                    JOIN board b ON e.equipmentID = b.equipmentID
                    WHERE e.designatedRoom = rooms.roomID AND b.smart = 1
                ))";
            }

            if (!empty($_POST['room_type'])) {
                $filters .= " AND roomType = '" . mysqli_real_escape_string($conn, $_POST['room_type']) . "'";
            }

            $query = "SELECT * FROM rooms $filters";
            error_log("Query: $query");

            $result = mysqli_query($conn, $query);

            while ($room = mysqli_fetch_assoc($result)) {
                $image = !empty($room['roomImg']) ? $room['roomImg'] : 'public_html/images/default-room.jpeg';
                echo "<div class='room-card'>
                    <img src='$image' alt='{$room['roomName']}' class='room-image'>
                    <h6>{$room['roomName']}</h6>
                    <p>{$room['roomDesc']}</p>
                    <p>Capacity: {$room['capacity']}</p>
                    <form method='POST' action='RoomBooking.php'>
                        <input type='hidden' name='room_id' value='{$room['roomID']}'>
                        <input type='hidden' name='selected_date' value='{$_SESSION['selected_date']}'>
                        ";
                if (isset($_SESSION['username'])) {
                    echo "<button type='submit' class='btn btn-primary'>Book Now</button>";
                } else {
                    echo "<p class='text-danger'>Please log in to book.</p>";
                }
                echo "</form>
                </div>";
            }
            ?>
        </div>
    </div>
</div>
<footer class="text-white text-center py-3 mt-5">
    OpenBook &copy; 2025
</footer>
</body>
</html>
