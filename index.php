<?php
session_start();

// Check if the logout action is triggered
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}
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
    <link rel="stylesheet" href="public_html/style/main.css">
    <!-- Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public_html/js/main.js"></script>

    <title>OpenBook Home</title>
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Header -->
    <header class="header text-center py-4 ">
        <img src="public_html/images/purple-circle-shape.png" alt="Left Decorative Circle" class="circle left-circle">
        <img src="public_html/images/purple-circle-shape.png" alt="Right Decorative Circle" class="circle right-circle">

        <div class="container">
            <div class="d-flex justify-content-end">
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="text-light px-3">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                    <a href="index.php?action=logout" class="btn btn-link text-light px-3">Log Out</a>
                <?php else: ?>
                    <a href="SignUp.php" class="btn btn-link text-light px-3">Sign Up</a>
                    <a href="Login.php" class="btn btn-link text-light px-3">Log In</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Body -->
    <main class="body-content text-center py-5 flex-grow-1">
        <div class="container">
            <div class="logo mb-3">
                <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo" class="img-fluid" style="max-width: 300px; height: auto;">
            </div>
            <h2 class="text-secondary mb-4">A Smart Way To Book Out Your Rooms</h2>
            <div class="mt-3">
                <a href="SignUp.php" class="btn btn-primary btn-lg mx-2">Sign Up</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer text-center py-3 text-light">
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#" class="text-light">Home</a></li>
                <li class="list-inline-item"><a href="BookRooms.php" class="text-light">Book Room</a></li>
                <li class="list-inline-item"><a href="ManageBookings.php" class="text-light">Manage Bookings</a></li>
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
