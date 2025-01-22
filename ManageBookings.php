<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINKS Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"rel="nofollow" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="public_html/style/main.css">
    <!-- Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public_html/js/main.js"></script>

    <title> Manage Bookings </title>
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
                <a class="nav-item nav-link" href="BookRooms.php">Book Room</a>
                <a class="nav-item nav-link" href="ManageBookings.php">Manage Bookings</a>
                <a class="nav-item nav-link active" href="AboutUs.php">About Us</a>
                <a class="nav-item nav-link" href="ReportPage.php">Report</a>
                
                    <button onclick="window.location.href='index.php?action=logout'" class="btn btn-primary ml-3">Log Out</button>
                
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-6">
        <h2 class="text-center">Manage Bookings </h2>
        <h3 class="text-center mb-4">Upcoming: </h3>
        <div class="row">

        <div class="booking">
            <div class="booking-info">
                <div class="room">Room MP242</div>
                <div class="location">Classroom, Millenium Point, Level 2</div>
                <div class="time">11:00 - 12:00</div>
                <div class="date">17/08/23</div>
            </div>
        
            <button class="cancel-button">Cancel Booking</button>
        </div>

        <div class="booking">
            <div class="booking-info">
                <div class="room">Room MP248</div>
                <div class="location">Classroom, Millenium Point, Level 2</div>
                <div class="time">11:00 - 12:00</div>
                <div class="date">17/08/23</div>
            </div>

            <button class="cancel-button">Cancel Booking</button>
        </div>

        <div class="booking">
            <div class="booking-info">
                <div class="room">Room MP162</div>
                <div class="location">Classroom, Millenium Point, Level 1</div>
                <div class="time">11:00 - 12:00</div>
                <div class="date">17/08/23</div>
            </div>

            <button class="cancel-button">Cancel Booking</button>
        </div>

        <div class="booking">
            <div class="booking-info">
                <div class="room">Room MP163</div>
                <div class="location">Classroom, Millenium Point, Level 1</div>
                <div class="time">11:00 - 12:00</div>
                <div class="date">17/08/23</div>
            </div>

            <button class="cancel-button">Cancel Booking</button>

        </div>

        <div class="booking">
            <div class="booking-info">
                <div class="room">Room MP503</div>
                <div class="location">Classroom, Millenium Point, Level 5</div>
                <div class="time">11:00 - 12:00</div>
                <div class="date">17/08/23</div>
            </div>

        
            <button class="cancel-button">Cancel Booking</button>
            
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

