<?php
session_start(); // Ensure session is started

include "resources/database.php";
include 'resources/html_construct.php';

if ($conn === null) {
    die("Database connection not established.");
}

// Ensure 'selected_date' is set before accessing it
$selectedDate = isset($_SESSION['selected_date']) ? $_SESSION['selected_date'] : date('Y-m-d');
$selectedTime = isset($_SESSION['selected_time']) ? $_SESSION['selected_time'] : '';

// Save selected date and time to session for future use
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selected_date'])) {
        $_SESSION['selected_date'] = $_POST['selected_date'];
    } else {
        $_SESSION['selected_date'] = date('d-m-Y');
    }
    if (isset($_POST['selected_time'])) {
        $_SESSION['selected_time'] = $_POST['selected_time'];
    } else {
        $_SESSION['selected_time'] = date('H:i:s');
    }
} else{
    $_SESSION['selected_date'] = date('Y-m-d');
    $_SESSION['selected_time'] = date('H:i:s');
}

function getComputerCount($conn, $roomID) {
    $query = "SELECT COUNT(*) as num_computers FROM computers c JOIN equipment e ON c.equipmentID = e.equipmentID WHERE e.designatedRoom = $roomID AND e.status = 'Operational'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['num_computers'] ?? 0;
}



// Determine the building ID
$buildingId = $_POST['building_id'] ?? $_GET['buildingID'] ?? null;
if (!$buildingId) {
    die("<p class='text-danger'>Building ID is missing. Please select a building to view rooms.</p>");
}

$buildingId = intval($buildingId);                                  // Collecting building ID
$buildingName = getBuildingName($conn, $buildingId);    // Collecting building name


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
    <?php HTMLHeadBoilerplate();  // Boilerplate 
            echo "<title>" . htmlspecialchars($buildingName) . "</title>"; // Dynamic title
    ?>
</head>

<body>
<!-- Header / NAVBAR -->
    <header>
        <?php display_header(); ?>
    </header>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h5>Select Filters</h5>
            <form method="POST" action="RoomSelection.php">
                <input type="hidden" name="building_id" value="<?php echo htmlspecialchars($buildingId); ?>">
                <input type="date" name="selected_date" class="form-control" value="<?php echo $_SESSION['selected_date'] ?? date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
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
                $filters .= " AND (";
                $conditions = [];
                if (isset($_POST['microphone'])) {
                    $conditions[] = "EXISTS (
                        SELECT 1 FROM equipment e
                        JOIN microphone m ON e.equipmentID = m.equipmentID
                        WHERE e.designatedRoom = rooms.roomID AND e.status = 'Operational'
                    )";
                }
                if (isset($_POST['smartboard'])) {
                    $conditions[] = "EXISTS (
                        SELECT 1 FROM equipment e
                        JOIN board b ON e.equipmentID = b.equipmentID
                        WHERE e.designatedRoom = rooms.roomID AND b.smart = 1
                    )";
                }
                $filters .= implode(" OR ", $conditions) . ")";
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
    <!-- Footer -->
    <?php
        display_footer();
    ?>
</body>
</html>
