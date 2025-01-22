<?php
session_start();

// Dummy Data
$timeSlots = [
    "11:00" => "available",
    "12:00" => "selected",
    "13:00" => "available",
    "14:00" => "available",
    "15:00" => "booked",
    "16:00" => "booked",
    "17:00" => "available",
];

// Function to get the number of computers in a room
function getComputerCount($conn, $roomID) {
    $query = "SELECT COUNT(*) as num_computers FROM computers c JOIN equipment e ON c.equipmentID = e.equipmentID WHERE e.designatedRoom = $roomID";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['num_computers'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public_html/style/main.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public_html/js/main.js"></script>
    <title>Room Selection</title>
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

    <!-- Main Content -->
    <div class="container">
        <div class="availability-key">
            <p>
                <span class="key-selected"></span> Selected
                <span class="key-available"></span> Available
                <span class="key-booked"></span> Fully Booked
            </p>
        </div>
        <div class="row">
            <!-- Calendar Section -->
            <div class="col-md-4 calendar-container">
                <h5>Select a Date and Time</h5>
                <form method="POST" action="RoomSelection.php">
                    <?php $buildingID = isset($_GET['buildingID']) ? intval($_GET['buildingID']) : (isset($_POST['buildingID']) ? intval($_POST['buildingID']) : 0); ?>
                    <input type="hidden" name="buildingID" value="<?php echo $buildingID; ?>">
                    <input type="date" name="selected_date" class="form-control" value="2023-08-17">
                    <input type="number" name="min_seats" class="form-control mt-3" placeholder="Minimum Required Seats" min="1" max="500">
                    <input type="number" name="min_seats" class="form-control mt-3" placeholder="Minimum Computers (Non-Functional)" min="1" max="500">
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
                        <input class="form-check-input" type="radio" name="room_type" id="classroom" value="classroom">
                        <label class="form-check-label" for="classroom">Classroom</label><br>
                        <input class="form-check-input" type="radio" name="room_type" id="hall" value="hall">
                        <label class="form-check-label" for="hall">Hall</label><br>
                        <input class="form-check-input" type="radio" name="room_type" id="lab" value="lab">
                        <label class="form-check-label" for="lab">Lab</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">View Available Rooms</button>
                </form>
            </div>

            <!-- Time Slots Section -->
            <div class="col-md-4 time-container">
                <h5>Available Time Slots</h5>
                <?php foreach ($timeSlots as $time => $status): ?>
                    <?php $class = $status === 'booked' ? 'time-slot booked' : ($status === 'selected' ? 'time-slot selected' : 'time-slot'); ?>
                    <form method='POST' action='RoomSelection.php'>
                        <input type='hidden' name='buildingID' value='<?php echo $buildingID; ?>'>
                        <button name='selected_time' value='<?php echo $time; ?>' class='<?php echo $class; ?>'><?php echo $time; ?></button>
                    </form>
                <?php endforeach; ?>
            </div>

            <!-- Rooms Section -->
            <div class="col-md-4 room-container">
                <h5>Rooms that match your criteria</h5>
                <?php
                include "resources/database.php";

                if ($conn === null) {
                    die("Database connection not established.");
                }

                $buildingID = isset($_POST['buildingID']) ? intval($_POST['buildingID']) : (isset($_GET['buildingID']) ? intval($_GET['buildingID']) : 0);
                $minSeats = isset($_POST['min_seats']) ? intval($_POST['min_seats']) : 0;

                if ($buildingID > 0) {
                    $roomSql = "SELECT * FROM rooms WHERE building = $buildingID AND capacity >= $minSeats";
                    $fetchedRooms = mysqli_query($conn, $roomSql);

                    foreach ($fetchedRooms as $room) {
                        $numComputers = getComputerCount($conn, $room['roomID']);
                        $class = 'room-card';
                        echo "<div class='$class'>
                                <div>
                                    <strong>{$room['roomName']}</strong>
                                    <p>{$room['roomDesc']}</p>
                                    <p>Capacity: {$room['capacity']}</p>
                                    <p>Computers: $numComputers</p>
                                </div>
                                <img src='{$room['roomImg']}' alt='{$room['roomName']}'>
                                <form method='GET' action='RoomBooking.php'>
                                    <button name='roomID' value='{$room['roomID']}' class='btn btn-primary mt-2'>Book</button>
                                    <input type='hidden' name='buildingID' value='$buildingID'>
                                </form>
                              </div>";
                    }
                } else {
                    echo "<p class='text-danger'>Invalid building selected.</p>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
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