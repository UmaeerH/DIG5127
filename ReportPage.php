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
    <link rel="stylesheet" href="public_html/style/Report Page.css">
    <!-- Javascript -->
    <script src="public_html/js/Bookrooms.js"></script>


    <title>Report Page</title>
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
                <a class="nav-item nav-link" href="#">Manage Bookings</a>
                <a class="nav-item nav-link" href="#">About Us</a>
                <a class="nav-item nav-link" href="ReportPage.php">Report</a>
                <button class="btn btn-primary ml-3">Log Out</button>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Report an Issue</h2>
        <p><strong>Problem with the room you selected?:</strong> Room C218, Classroom, Curzon Level 2</p>
        <p>If you are facing an issue with this room, you can choose an option below to describe the problem.</p>
        <p>We will fix the issue as soon as possible and re-arrangements can be made depending on the type of problem.</p>

        
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">IT Fault</h5>
                        <p class="card-text">This includes faulty projectors, sockets, or devices in the room.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Electricity</h5>
                        <p class="card-text">This includes lighting or any power outages.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Heating or Air Conditioning</h5>
                        <p class="card-text">This includes faulty heaters or air conditioning.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Other</h5>
                        <p class="card-text">If that issue has not been listed above, select this option.</p>
                    </div>
                </div>
            </div>
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