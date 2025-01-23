<?php

function display_footer() {     
    echo '
    <footer class="footer text-center py-3 text-light">
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
