<?php
// Dummy Data for the the page Im just testing to see if it works
$timeSlots = [
    "11:00" => "available",
    "12:00" => "selected",
    "13:00" => "available",
    "14:00" => "available",
    "15:00" => "booked",
    "16:00" => "booked",
    "17:00" => "available",
];

$rooms = [
    [
        "name" => "Room C084",
        "details" => "Classroom, Curzon Level 0",
        "status" => "available",
        "image" => "public_html/images/curson-slider.jpeg"
    ],
    [
        "name" => "Room C218",
        "details" => "Classroom, Curzon Level 2",
        "status" => "available",
        "image" => "public_html/images/curson-slider.jpeg"
    ],
    [
        "name" => "The Atrium",
        "details" => "Hall, Curzon Level 2",
        "status" => "available",
        "image" => "public_html/images/curson-slider.jpeg"
    ],
    [
        "name" => "Room C302",
        "details" => "Classroom, Curzon Level 3",
        "status" => "booked",
        "image" => "public_html/images/curson-slider.jpeg"
    ],
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"rel="nofollow" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="public_html/style/RoomSelection.css">
    <!-- Javascript -->
    <script src="public_html/js/Bookrooms.js"></script>


    <title>Room Selection</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-teal">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo">
            </a>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="index.php">Home</a>
                <a class="nav-item nav-link active" href="Book Rooms.php">Book Room</a>
                <a class="nav-item nav-link" href="#">Manage Bookings</a>
                <a class="nav-item nav-link" href="#">About Us</a>
                <a class="nav-item nav-link" href="Report page.php">Report</a>
                <button class="btn btn-primary ml-3">Log Out</button>
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
                    <input type="date" name="selected_date" class="form-control" value="2023-08-17">
                    <button type="submit" class="btn btn-primary mt-3">View Times</button>
                </form>
            </div>

            <!-- Time Slots Section -->
            <div class="col-md-4 time-container">
                <h5>Available Time Slots</h5>
                <?php
                foreach ($timeSlots as $time => $status) {
                    $class = $status === 'booked' ? 'time-slot booked' : ($status === 'selected' ? 'time-slot selected' : 'time-slot');
                    echo "<form method='POST' action='RoomSelection.php'>
                            <button name='selected_time' value='$time' class='$class'>$time</button>
                          </form>";
                }
                ?>
            </div>

            <!-- Rooms Section -->
            <div class="col-md-4 room-container">
                <h5>Available Rooms</h5>
                <?php
                foreach ($rooms as $room) {
                    $class = $room['status'] === 'booked' ? 'room-card booked' : 'room-card';
                    $disabled = $room['status'] === 'booked' ? 'disabled' : '';
                    echo "<div class='$class'>
                            <div>
                                <strong>{$room['name']}</strong>
                                <p>{$room['details']}</p>
                            </div>
                            <img src='{$room['image']}' alt='Room Image'>
                            <form method='GET' action='RoomBooking.php'>
                                <button name='room_name' value='{$room['name']}' class='btn btn-primary mt-2' $disabled>Book</button>
                            </form>
                          </div>";
                }
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