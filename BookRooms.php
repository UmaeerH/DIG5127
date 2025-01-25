<?php
session_start(); // Start the session
include 'resources/html_construct.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>Book Rooms</title>
</head>

<body>
<!-- Header / NAVBAR -->
<header>
    <?php display_header(); ?>
</header>

    <!-- Video display -->
    <header class="header-br">
     <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="public_html/videos/buildings.mp4" type="video/mp4">
    </video>
    <!-- The header content -->
     <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white">
            <h1 class="display-3">View our selections</h1>
            <p class="lead mb-0">With many buildings to select from across the UK, there are many rooms and workspaces to suit your needs and availability.</p>
        </div>
    </div>
    </div>
</header>

    <div class="container mt-5">
        <!--Archive text
        <h2 class="text-center">View our selection</h2>
        <p class="text-center">With many buildings to select from across the UK, there are many rooms and workspaces to suit your needs and availability.</p>
        <h3 class="text-center mb-4">Select A Building</h3>
        -->
        <div class="row">

            <!-- Building Cards -->
            <?php
            include "resources/database.php";

            if ($conn === null) { 
                die("Database connection not established."); 
            }

            $buildingSql = "SELECT * FROM `buildings`";
            $fetchedBuildings = mysqli_query($conn, $buildingSql);

            foreach ($fetchedBuildings as $building) {
                echo "
                <div class='col-md-3'>
                    <div class='card h-100'>
                        <img class='card-img-top' src='{$building['buildingImg']}' alt='{$building['buildingName']}'>
                        <div class='card-body d-flex flex-column'>
                            <h5 class='card-title'>{$building['buildingName']}</h5>
                            <p class='card-text'>{$building['buildingDesc']}</p>
                            <a href='RoomSelection.php?buildingID={$building['buildingID']}' class='btn btn-primary mt-auto'>Book Now</a>
                        </div>
                    </div>
                </div>
                ";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php
        display_footer();
    ?>
    
</body>
</html>
