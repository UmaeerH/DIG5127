<?php
session_start();
include "resources/html_construct.php";
include "resources/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>This Project</title>
</head>

<!-- Header / NAVBAR -->
<header>
    <?php display_header(); ?>
</header>

<!--Body-->
<body>
<div class="container">
    <div class="container text-center">
        <h1 class="display-4">Our Project</h1>
    </div>
    
    <!-- Xampp Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-center"> XAMPP </h2>
        </div>
        <div class="col-md-6 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h6>Apache</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h6>MySQL</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Tools Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-center"> Tools </h2>
        </div>
        <div class="col-md-4 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h6>HTML + CSS</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h6> PHP + SQL</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h6> JavaScript </h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Technologies Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-center"> Technologies </h2>
        </div>
        <div class="col-md-6 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h6>GitHub + Git</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="expandCard building-card h-100">
                <div class="card-body text-center">
                    <h6> BootStrap CSS</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="bg-light">
    <div class="container text-center">
        <h1>Interested?</h1>
        <p>This repo is open for copying and modifying as you see fit (GPL-2.0)</p>
        <div class="card bg-light-custom text-black mt-4">
            <div class="card-body">
                <a href="https://github.com/UmaeerH/DIG5127" class="btn btn-outline-custom btn-lg au-slow-hover">View the Repository</a>
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