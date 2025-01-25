<?php
session_start();
include "resources/html_construct.php";

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
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>OpenBook Home</title>
</head>

<body>
    <!-- Header -->
    <header class="header text-center py-4 ">
        <img src="public_html/images/purple-circle-shape.png" alt="Left Decorative Circle" class="circle left-circle">
        <img src="public_html/images/purple-circle-shape.png" alt="Right Decorative Circle" class="circle right-circle">

        <div class="container">
            <div class="d-flex justify-content-end">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="ManageAccount.php" class="btn btn-link text-light px-3">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</a>
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
            <?php if (isset($_SESSION['username'])): ?>
                <a href="ManageBookings.php" class="btn btn-primary btn-lg mx-2">View my bookings</a>
                <?php else: ?>
                    <a href="SignUp.php" class="btn btn-primary btn-lg mx-2">Sign Up</a>
            <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php
        display_footer();
    ?>

</body>
</html>
