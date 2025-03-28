<?php
session_start();

include "resources/database.php";
include 'resources/html_construct.php';

if ($conn === null) {
    die("Database connection not established.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetchs the form inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prevents SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Queries to fetch the user by their username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifys the password using password_verify()
        if (password_verify($password, $user['password'])) {
            // Stores the user's details in session variables
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            // Redirects the user to the homepage or user dashboard
            header("Location: index.php");
            exit;
        } else {
            $error_message = "Invalid username or password.";
        }
    } else {
        $error_message = "Invalid username or password.";
    }
}

// Closeses the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>Login Page</title>
</head>

<body>
<!-- Header / NAVBAR -->
<header>
    <?php display_header(); ?>
</header>

    <!-- Main Content -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Log In</h2>
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form action="Login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-dark btn-block">Log In</button>
                <div class="text-center mt-2">
                    <p>No Account? <a href="SignUp.php">Sign up now</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php
        display_footer();
    ?>
</body>
</html>
