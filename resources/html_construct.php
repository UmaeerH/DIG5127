<?php

function HTMLHeadBoilerplate() {        // This will be put into the header as the generic boilerplate. Reduces code re-use
    echo'
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"rel="nofollow" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="public_html/style/main.css">
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public_html/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    ';
}


function display_header() {
    echo '
    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="display: flex; align-items: center;">
                <img src="public_html/images/OpenBook_LogoLight.png" alt="OpenBook Logo" class="HdrlogoLight" style="height: 80px; max-width: 100%; margin-right: 10px;">
                <span class="d-none">OpenBook</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li> ';
            if (isset($_SESSION['username'])) { // If logged in
                echo '
                    <li class="nav-item">
                        <a class="nav-link" href="BookRooms.php">Book Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ManageBookings.php">View my bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ManageAccount.php">Manage Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ReportPage.php">Report an Issue</a>
                    </li>
                ';
            } else { // if logged out
                echo '
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Log in</a>
                    </li>
                ';
                }
                echo '
                    <li class="nav-item">
                        <a class="nav-link" href="AboutUs.php">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    ';
}

function display_footer() {     
    echo '
    <footer class="footer text-center py-3 text-light mt-5">
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php" class="text-light">Home</a></li>';
    if (isset($_SESSION['username'])) {     // If they are logged in = View building, manage bookings
        echo '
                <li class="list-inline-item"><a href="BookRooms.php" class="text-light">View Buildings</a></li>
                <li class="list-inline-item"><a href="ManageBookings.php" class="text-light">Manage Bookings</a></li>';
    } else {                                // If they are logged out = Sign up
        echo '
                <li class="list-inline-item"><a href="SignUp.php" class="text-light">Sign Up</a></li>';
    }
        echo '
                <li class="list-inline-item"><a href="AboutUs.php" class="text-light">About us</a></li>
            </ul>
            <p class="small mt-2 text-light">
                OpenBook™ LLC is registered to operate in England & Wales under the Companies House.
            </p>
        </div>  
    </footer>
    ';
}
    
?>
