<?php
require 'resources/database.php'; 
include 'resources/html_construct.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // This Collects the form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $userType = $_POST['user_type'];

    // This makes sure the 2 passwords match 
    if ($password !== $confirmPassword) {
        die('Error: Passwords do not match.');
    }

    // Finds out what the userType category is
    $userTypeCategory = '';
    if ($userType === 'Student' || $userType === 'Staff') {
        $userTypeCategory = 'University';
    } elseif ($userType === 'Enterprise' || $userType === 'Private') {
        $userTypeCategory = 'External';
    } else {
        die('Error: Invalid user type.');
    }

    // Hash encrypts the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserts it into users table
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, firstName, lastName, userType) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssss', $username, $hashedPassword, $email, $firstName, $lastName, $userTypeCategory);

    if (!$stmt->execute()) {
        if ($stmt->errno === 1062) { // Duplicate detail error
            die('Error: Email or username already exists.');
        } else {
            die('Error: ' . $stmt->error);
        }
    }

    $userId = $stmt->insert_id; 

    // this handles userType-specific logics
    if ($userType === 'Student') {
        $universityName = $_POST['university_name'];
        $faculty = $_POST['faculty'];
        $studentId = $_POST['student_id'];
        $course = $_POST['course'];

        // Inserts data into universityusers
        $stmt = $conn->prepare("INSERT INTO universityusers (user_id, university_name, faculty) VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $userId, $universityName, $faculty);
        if (!$stmt->execute()) {
            die('Error: ' . $stmt->error);
        }

        // Inserts data into universitystudents
        $stmt = $conn->prepare("INSERT INTO universitystudents (user_id, studentID, course) VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $userId, $studentId, $course);
        if (!$stmt->execute()) {
            die('Error: ' . $stmt->error);
        }

    } elseif ($userType === 'Staff') {
        $universityName = $_POST['university_name'];
        $faculty = $_POST['faculty'];
        $department = $_POST['department'];

        // Inserts data into universityusers
        $stmt = $conn->prepare("INSERT INTO universityusers (user_id, university_name, faculty) VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $userId, $universityName, $faculty);
        if (!$stmt->execute()) {
            die('Error: ' . $stmt->error);
        }

        // Inserts data into universitystaff
        $stmt = $conn->prepare("INSERT INTO universitystaff (user_id, department) VALUES (?, ?)");
        $stmt->bind_param('is', $userId, $department);
        if (!$stmt->execute()) {
            die('Error: ' . $stmt->error);
        }

    } elseif ($userType === 'Enterprise' || $userType === 'Private') {
        $company = $_POST['company'] ?? '';
        $role = $_POST['role'] ?? '';
        $externalType = $userType;

        // This Checks the required fields for enterprise users have been entered
        if ($userType === 'Enterprise' && empty($company)) {
            die('Error: Company name is required for enterprise users.');
        }

        // Inserts data into externalusers
        $stmt = $conn->prepare("INSERT INTO externalusers (user_id, company, role, externalType) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('isss', $userId, $company, $role, $externalType);
        if (!$stmt->execute()) {
            die('Error: ' . $stmt->error);
        }
    }
    
    echo '<script>alert("Registration successful!")</script>';
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>Sign Up</title>
</head>
<body>
<!-- Header / NAVBAR -->
<header>
    <?php display_header(); ?>
</header>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Sign Up</h2>
        <form method="POST">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="user_type">User Type</label>
                <select name="user_type" class="form-control" required>
                    <option value="Student" selected>Student</option>
                    <option value="Staff">Staff</option>
                    <option value="Enterprise">Enterprise</option>
                    <option value="Private">Private</option>
                </select>
            </div>
            <div id="additional-fields">
                <div class="form-group">
                    <label for="university_name">University Name</label>
                    <input type="text" name="university_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="faculty">Faculty</label>
                    <input type="text" name="faculty" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" name="student_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" name="course" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-block">Sign Up</button>
            <div class="text-center mt-2">
                <p>Already have an account? <a href="Login.php">Login here</a></p>
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
