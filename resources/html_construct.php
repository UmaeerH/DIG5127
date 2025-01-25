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
            <p class="small mt-2 text-dark">
                OpenBook™ LLC is registered to operate in England & Wales under the Companies House.
            </p>
        </div>  
    </footer>
    ';
}




?>
