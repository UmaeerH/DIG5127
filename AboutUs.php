<?php
session_start();
include "resources/html_construct.php";
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
            <!-- Millenium Point -->
            <div class="col-md-6">
                <div class="expandCard au-building-card h-100">
                    <div class="card-body text-center">
                        <div class="au-circle-icon mx-auto mb-3">A</div>
                        <h5 class="card-title">Millenium Point Building</h5>
                        <img src="public_html/images/mp-exterior.jpeg" class="img-fluid my-3" alt="Millenium Point">
                        <h6>40+ Rooms Available</h6>
                        <p class="card-text">Located in the heart of the city centre, this lively and bright room would be a great choice for those looking for a private and quiet place to meet with their team.</p>
                        <a href="BookRooms.php" class="btn btn-custom au-slow-hover">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Parkside -->
            <div class="col-md-6">
                <div class="expandCard building-card h-100">
                    <div class="card-body text-center">
                        <div class="circle-icon mx-auto mb-3">A</div>
                        <h5 class="card-title">Parkside Building</h5>
                        <img src="public_html/images/parkside-gallery.jpeg" class="img-fluid my-3" alt="Parkside Building">
                        <h6>30+ Rooms Available</h6>
                        <p class="card-text">The twin building of Millenium Point contains a lot of equipment for those studying or interested in the arts such as music and painting.</p>
                        <a href="BookRooms.php" class="btn btn-custom au-slow-hover">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Curzon -->
            <div class="col-md-6">
                <div class="expandCard building-card h-100">
                    <div class="card-body text-center">
                        <div class="circle-icon mx-auto mb-3">A</div>
                        <h5 class="card-title">Curzon Building</h5>
                        <img src="public_html/images/curson-slider.jpeg" class="img-fluid my-3" alt="Curzon Building">
                        <h6>60+ Rooms Available</h6>
                        <p class="card-text">Located in the heart of the city centre, this lively and bright room would be a great choice for those looking for a private and quiet place to meet with their team.</p>
                        <a href="BookRooms.php" class="btn btn-custom au-slow-hover">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- STEAMhouse -->
            <div class="col-md-6">
                <div class="expandCard building-card h-100">
                    <div class="card-body text-center">
                        <div class="circle-icon mx-auto mb-3">A</div>
                        <h5 class="card-title">STEAMhouse Building</h5>
                        <img src="public_html/images/steamhouse-exterior.jpeg" class="img-fluid my-3" alt="STEAMhouse Building">
                        <h6>50+ Rooms Available</h6>
                        <p class="card-text">Created with technology and innovation in mind, this cutting-edge building contains all the equipment a modern team would require to make the most out of their meetings.</p>
                        <a href="BookRooms.php" class="btn btn-custom au-slow-hover">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-light">
        <div class="container text-center">
            <h1>Require space for studying, meetings or events?</h1>
            <p>We're here to support your academic and professional journey by providing a reliable and organized system that saves you time and keeps you focused on what matters most. </p>
            <div class="card bg-light-custom text-black mt-4">
                <div class="card-body">
                    <p>Contact OpenBook for further enquiries</p>
                    <a href="BookRooms.php" class="btn btn-outline-custom btn-lg au-slow-hover">Contact</a>
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