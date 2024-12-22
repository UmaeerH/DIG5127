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
    <link rel="stylesheet" href="public_html/style/main.css">
    <!-- Javascript -->
    <script src="public_html/js/main.js"></script>


    <title>OpenBook Home</title>
</head>


<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Header -->
    <header class="header text-center py-4 ">
     <img src="public_html/images/purple-circle-shape-png-5258.png" alt="Left Decorative Circle" class="circle left-circle">
     <img src="public_html/images/purple-circle-shape-png-5258.png" alt="Right Decorative Circle" class="circle right-circle">

        <div class="container">
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-link text-light px-3">Sign Up</a>
                <a href="#" class="btn btn-link text-light px-3">Log In</a>
            </div>
        </div>
    </header>

    <?php
    echo "";
    ?>

    <!-- Body -->
    <main class="body-content text-center py-5 flex-grow-1">
        <div class="container">
            <div class="logo mb-3">
            <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo" class="img-fluid" style="max-width: 300px; height: auto;">
            </div>
            <h2 class="text-secondary mb-4">A Smart Way To Book Out Your Rooms</h2>
            <div class="mt-3">
                <a href="#" class="btn btn-primary btn-lg mx-2">Sign Up or Login</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer text-center py-3 text-light">
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#" class="text-light">Home</a></li>
                <li class="list-inline-item"><a href="Book Rooms.php" class="text-light">Book Room</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Manage Bookings</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Help</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Contact Us</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Careers</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Legal</a></li>
            </ul>
            <p class="small mt-2">
                OpenBook™ LLC is registered to operate in England & Wales under the Companies House.
            </p>
        </div>
    </footer>

</body>
</html>
