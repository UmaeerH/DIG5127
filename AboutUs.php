<?php
session_start();
include "resources/html_construct.php";
include "resources/database.php";

// Fetch building information from the database
$buildings = getBuildings();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>About Us</title>
</head>

<!-- Header / NAVBAR -->
<header>
    <?php display_header(); ?>
</header>

<section class="au-hero text-white text-center">
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <h1 class="display-4">About Us</h1>
        <p class="lead">Welcome to the Birmingham City University Room Booking Platform! <br> Our mission is to simplify room bookings and scheduling across all BCU buildings, ensuring a seamless <br> and efficient experience for students, staff, and visitors.</p>
        <a href="SignUp.php" class="btn btn-outline-custom btn-lg au-slow-hover">Sign up</a>
    </div>
</section>

<!--Body-->
<body>
<div class="container">
    <div class="row" class="au-column">
        <div class="container text-center">
            <h1 class="display-4">Our Buildings</h1>
        </div>
        <h1 class="lead text-center"> Whether you need a space for studying, meetings, or events, our platform provides an intuitive and user-friendly 
        interface to browse, reserve, and manage room bookings. With real-time availability, tailored search options, 
        and comprehensive building details, we make finding the perfect space effortless.</h1>
        
        <?php foreach ($buildings as $building): ?>
            <div class="col-md-6">
                <div class="expandCard building-card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $building['buildingName']; ?></h5>
                        <img src="<?php echo $building['buildingImg']; ?>" class="img-fluid my-3" alt="<?php echo $building['buildingName']; ?>">
                        <h6>Rooms Available</h6>
                        <p class="card-text"><?php echo $building['buildingDesc']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<section class="bg-light">
    <div class="container text-center">
        <h1>Require space for studying, meetings or events?</h1>
        <p>We're here to support your academic and professional journey by providing a reliable and organized system that saves you time and keeps you focused on what matters most. </p>
        <div class="card bg-light-custom text-black mt-4">
            <div class="card-body">
                <a href="SignUp.php" class="btn btn-outline-custom btn-lg au-slow-hover">Sign Up</a>
            </div>
        </div>
    </div>
</section>

<!---- FOOTER ---->
<?php
    display_footer();
?>

</body>
</html>