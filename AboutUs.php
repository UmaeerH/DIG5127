<?php
session_start();
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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="public_html/style/main.css">
    <!-- Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public_html/js/main.js"></script>
    <title>About Us </title>
</head>

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
                <?php if (isset($_SESSION['username'])): ?>
                    <button onclick="window.location.href='index.php?action=logout'" class="btn btn-primary ml-3">Log Out</button>
                <?php endif; ?>
            </div>
        </div>
    </nav>
<!--Header-->

<!--
<body class="bg-light d-flex flex-column min-vh-100">
-->

<section class="au-hero text-white text-center">
        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4">About Us</h1>
            <p class="lead">Welcome to the Birmingham City University Room Booking Platform! <br> Our mission is to simplify room bookings and scheduling across all BCU buildings, ensuring a seamless <br> and efficient experience for students, staff, and visitors.</p>
            <style>
                .btn-outline-custom {
                    background-color: transparent;
                    border: 2px solid #fff;
                    color: #fff;
                    font-size: 25px;
                }
            </style>
            <a href="#" class="btn btn-outline-custom btn-lg au-slow-hover">Sign up</a>
        </div>
    </section>
    <style>
        .building-card {
            border: none;
        }

        .building-card img {
            border-radius: 10px;
        }

        .building-card .circle-icon {
            width: 40px;
            height: 40px;
            background-color: #e9d8fd;
            color: #6b46c1;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 20px;
        }

        .building-card .btn-primary {
            background-color: #6b46c1;
            border: none;
        }

        .building-card .btn-primary:hover {
            background-color: #5a38a9; 
        }
    </style>

<!--Body-->
<body>
<div class="container" style="padding-bottom: 65px; padding-top: 70px;">
        <div class="row" style="row-gap: 40px;">
            <div class="container text-center">
                <h1 class="display-4">Our Buildings</h1>
            </div>
        <h1 class="lead text-center" style="padding-bottom:20px;"> Whether you need a space for studying, meetings, or events, our platform provides an intuitive and user-friendly 
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
                        <style>
                            .btn-custom {
                                background-color: #5a38a9;
                                color: #ffffff;
                            }
                        </style>
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
                        <style>
                            .btn-custom {
                                background-color: #5a38a9;
                                color: #ffffff;
                            }
                        </style>
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
                        <style>
                            .btn-custom {
                                background-color: #5a38a9;
                                color: #ffffff;
                            }
                        </style>
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
                        <style>
                            .btn-custom {
                                background-color: #5a38a9;
                                color: #ffffff;
                            }
                        </style>
                        <a href="BookRooms.php" class="btn btn-custom au-slow-hover">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-light" style="padding: 65px;">
        <div class="container text-center">
            <h1>Require space for studying, meetings or events?</h1>
            <p>We're here to support your academic and professional journey by providing a reliable and organized system that saves you time and keeps you focused on what matters most. </p>
            <style>
                .bg-light-custom {
                    background-color: #e4cdff !important;
                }
            </style>
            <div class="card bg-light-custom text-black mt-4">
                <div class="card-body">
                    <p>Contact OpenBook for further enquiries</p>
                    <style>
                    .btn-outline-custom {
                        background-color: transparent;
                        border: 2px solid #fff;
                        color: #fff;
                    }
                    </style>
                    <a href="BookRooms.php" class="btn btn-outline-custom btn-lg au-slow-hover">Contact</a>
                </div>
            </div>
        </div>
    </section>

    <!---- FOOTER ---->
    <style>
        .bg-dark-custom {
            background-color: #4593A5;
        }
    </style>
    <footer class="bg-dark-custom text-black py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Get in Touch</h3>
                    <form action="#" method="post" class="mt-3">
                        <input type="text" name="EMAIL" class="form-control mb-2" placeholder="Email">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
                <div class="col">
                    <h3>Other Pages</h3>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Book Room</a></li>
                        <li><a href="#" class="text-white">Manage Bookings</a></li>
                        <li><a href="#" class="text-white">About Us</a></li>
                        <li><a href="#" class="text-white">Report</a></li>
                    </ul>
                </div>
                <div class="col-7">
                    <p class="mt-3">OpenBook™ LLC is a registered company in England & Wales under the Companies House.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<!--
<h1> About Us</h1>
    <p>Welcome to the Birmingham City University Room Booking Platform! Our mission is to simplify room bookings and 
        scheduling across all BCU buildings, ensuring a seamless and efficient experience for students, staff, and visitors.</p>

    <p>Whether you need a space for studying, meetings, or events, our platform provides an intuitive and user-friendly 
        interface to browse, reserve, and manage room bookings. With real-time availability, tailored search options, 
        and comprehensive building details, we make finding the perfect space effortless.</p>
        
    <p>We're here to support your academic and professional journey by providing a reliable and organized system 
        that saves you time and keeps you focused on what matters most. Explore the platform today and discover 
        how easy it is to book your next space at BCU!</p>
    -->

 <!-- Footer -->
  <!--
 <footer class="text-white text-center py-3 mt-5">
        <div class="container">
        <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php" class="text-light">Home  |</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Contact Us  |</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Legal</a></li>
            </ul>
            <p class="mt-3">OpenBook™ LLC is a registered company in England & Wales under the Companies House.</p>
        </div>
    </footer>
</body>
</html>
-->
