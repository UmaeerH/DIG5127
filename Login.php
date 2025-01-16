<php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- External CSS -->
    <link rel="stylesheet" href="public_html/style/main.css">
    <!-- Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="public_html/js/main.js"></script>

</head>
<body>
    <!-- Navbar (Header) -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand text-light" href="index.php">
                    <img src="public_html/images/OpenBook_Logo.png" alt="OpenBook Logo" style="height: 60px;">
                </a>
                <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbarNav" 
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php">Home |</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="Book Rooms.php">Book Room |</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="ManageBooking.php">Manage Bookings |</a>
                        </li>
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Report</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-light ml-lg-3">Log Out</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Log In</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-dark btn-block">Sign In</button>
                <div class="text-center mt-3">
                    <a href="#" class="text-muted">Forgot password?</a>
                </div>
                <div class="text-center mt-2">
                    <p> No Account? <a href="SignUp.php">Sign up now</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background-color: #008080;" class="text-light py-4">
        <div class="container text-center">
            <ul class="list-inline mb-3">
                <li class="list-inline-item"><a href="index.php" class="text-light">Home</a></li>
                <li class="list-inline-item"><span>|</span></li>
                <li class="list-inline-item"><a href="#" class="text-light">Contact Us</a></li>
                <li class="list-inline-item"><span>|</span></li>
                <li class="list-inline-item"><a href="#" class="text-light">Legal</a></li>
            </ul>
            <p class="mb-0">OpenBook™ LLC is a registered company in England & Wales under the Companies House.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
</php>