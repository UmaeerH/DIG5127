<?php
session_start();
include 'resources/html_construct.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>Report Page</title>
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
                <a class="nav-item nav-link" href="AboutUs.php">About Us</a>
                <a class="nav-item nav-link active" href="ReportPage.php">Report</a>
                <?php if (isset($_SESSION['username'])): ?>
                    <button onclick="window.location.href='index.php?action=logout'" class="btn btn-primary ml-3">Log Out</button>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="text-center">Report an Issue</h2>
        <p><strong>Problem with the room you selected?:</strong> Room C218, Classroom, Curzon Level 2</p>
        <p>If you are facing an issue with this room, you can choose an option below to describe the problem.</p>
        <p>We will fix the issue as soon as possible and re-arrangements can be made depending on the type of problem.</p>

        <div class="row">
            <!-- Cards -->
            <div class="col-md-6">
                <div class="card mb-3 expandCard" data-issue="IT Fault">
                    <div class="card-body">
                        <h5 class="card-title">IT Fault</h5>
                        <p class="card-text">This includes faulty projectors, sockets, or devices in the room.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3 expandCard" data-issue="Electricity">
                    <div class="card-body">
                        <h5 class="card-title">Electricity</h5>
                        <p class="card-text">This includes lighting or any power outages.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3 expandCard" data-issue="Heating or Air Conditioning">
                    <div class="card-body">
                        <h5 class="card-title">Heating or Air Conditioning</h5>
                        <p class="card-text">This includes faulty heaters or air conditioning.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3 expandCard" data-issue="Other">
                    <div class="card-body">
                        <h5 class="card-title">Other</h5>
                        <p class="card-text">If that issue has not been listed above, select this option.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden Form -->
        <div class="hidden-form mt-4">
            <h4 class="text-center">Please provide more information about the issue</h4>
            <form id="report-form">
                <div class="form-group">
                    <label for="details">Describe the issue:</label>
                    <textarea id="details" class="form-control" rows="4" placeholder="Provide a detailed description of the issue..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block p-3">Submit</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php
        display_footer();
    ?>

</body>
</html>