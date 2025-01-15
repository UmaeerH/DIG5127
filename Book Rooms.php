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
    <link rel="stylesheet" href="public_html/style/Bookrooms.css">
    <!-- Javascript -->
    <script src="public_html/js/Bookrooms.js"></script>


    <title>Book rooms</title>
</head>

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-teal">
        <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo" style="height: 80px;">
        </a>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="index.php">Home</a>
                <a class="nav-item nav-link active" href="Book Rooms.php">Book Room</a>
                <a class="nav-item nav-link" href="ManageBookings.php">Manage Bookings</a>
                <a class="nav-item nav-link" href="#">About Us</a>
                <a class="nav-item nav-link" href="Report page.php">Report</a>
                <button class="btn btn-primary ml-3">Log Out</button>
            </div>
        </div>
    </nav>

     <!-- Main Content -->
     <div class="container mt-5">
        <h2 class="text-center">View our selection</h2>
        <p class="text-center">With many buildings to select from across the UK, there are many rooms and workspaces to suit your needs and availability.</p>
        <h3 class="text-center mb-4">Select A Building</h3>
        <div class="row">
            <!-- Building Cards -->
            <?php
            $buildings = [
                [
                    "name" => "Millenium Point Building",
                    "rooms" => "40+",
                    "description" => "Located in the heart of the city centre, this lively and bright room would be a great choice for those looking for a private and quiet place to meet with their team.",
                    "image" => "public_html/images/mp-exterior.jpeg"
                ],
                [
                    "name" => "Parkside Building",
                    "rooms" => "30+",
                    "description" => "The twin building of Millenium Point contains a lot of equipment for those studying or interested in the arts such as Music and painting.",
                    "image" => "public_html/images/parkside-gallery.jpeg"
                ],
                [
                    "name" => "Curzon Building",
                    "rooms" => "60+",
                    "description" => "Located in the heart of the city centre, this lively and bright room would be a great choice for those looking for a private and quiet place to meet with their team.",
                    "image" => "public_html/images/curson-slider.jpeg"
                ],
                [
                    "name" => "STEAM House Building",
                    "rooms" => "50+",
                    "description" => "This cutting-edge building contains all the equipment a modern team would require to make the most out of their meetings.",
                    "image" => "public_html/images/steamhouse-exterior.jpeg"
                ]
            ];

            foreach ($buildings as $building) {
                echo "
                <div class='col-md-3'>
                    <div class='card'>
                        <img class='card-img-top' src='{$building['image']}' alt='{$building['name']}'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$building['name']}</h5>
                            <p class='card-text'>{$building['description']}</p>
                            <a href='RoomSelection.php?building=" . urlencode($building['name']) . "' class='btn btn-primary'>Book Now</a>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white text-center py-3 mt-5">
        <div class="container">
        <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php" class="text-light">Home</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Contact Us</a></li>
                <li class="list-inline-item"><a href="#" class="text-light">Legal</a></li>
            </ul>
            <p class="mt-3">OpenBook™ LLC is a registered company in England & Wales under the Companies House.</p>
        </div>
    </footer>
</body>
</html>

