<?php
include "resources/database.php";
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit;
}

// Fetch user information using the user ID from the session
$userID = $_SESSION['userID'];
$sql = "SELECT u.userID, u.username, u.firstName, u.lastName, u.email, u.userType,
        IFNULL(uu.university_name, 'None') AS university_name,
        IFNULL(uu.faculty, 'None') AS faculty,
        IFNULL(us.studentID, 'None') AS studentID,
        IFNULL(us.course, 'None') AS course,
        IFNULL(ust.department, 'None') AS department,
        IFNULL(ex.company, 'None') AS company,
        IFNULL(ex.role, 'None') AS role
        FROM users u
        LEFT JOIN universityusers uu ON u.userID = uu.user_id
        LEFT JOIN universitystudents us ON u.userID = us.user_id
        LEFT JOIN universitystaff ust ON u.userID = ust.user_id
        LEFT JOIN externalusers ex ON u.userID = ex.user_id
        WHERE u.userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $userInfo = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
}

// Update user information
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_field'])) {
    $field = $_POST['field'];
    $newValue = $_POST['new_value'];

    $sql = null;
    switch ($field) {
        case 'username':
        case 'firstName':
        case 'lastName':
        case 'email':
            $sql = "UPDATE users SET $field = ? WHERE userID = ?";
            break;
        case 'university_name':
        case 'faculty':
            $sql = "UPDATE universityusers SET $field = ? WHERE user_id = ?";
            break;
        case 'studentID':
        case 'course':
            $sql = "UPDATE universitystudents SET $field = ? WHERE user_id = ?";
            break;
        case 'department':
            $sql = "UPDATE universitystaff SET $field = ? WHERE user_id = ?";
            break;
        case 'company':
        case 'role':
            $sql = "UPDATE externalusers SET $field = ? WHERE user_id = ?";
            break;
    }

    if ($sql) {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $newValue, $userID);
        if ($stmt->execute()) {
            if ($field === 'username') {
                $_SESSION['username'] = $newValue;
            }
            $message = ucfirst($field) . " updated successfully.";
            header("Refresh:0");
        } else {
            $message = "Error updating " . ucfirst($field) . ".";
        }
    } else {
        $message = "Invalid field.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php HTMLHeadBoilerplate(); ?>     <!-- boilerplate head -->
    <title>Manage Account</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark-custom">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="public_html/images/OpenBook_LogoLight.png" alt="OpenBook Logo" style="height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="BookRooms.php">Book Room</a></li>
                <li class="nav-item"><a class="nav-link" href="ManageBookings.php">Manage Bookings</a></li>
                <li class="nav-item"><a class="nav-link active" href="ManageAccount.php">Manage Account</a></li>
                <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="ReportPage.php">Report</a></li>
                <li class="nav-item"><a class="nav-link btn btn-primary text-white" href="index.php?action=logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Account Details -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Manage Your Account</h2>
    <?php if (isset($message)): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title text-center">Account Details</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Username</th>
                    <td><?php echo htmlspecialchars($userInfo['username']); ?></td>
                    <td><button class="btn btn-primary btn-sm" onclick="editField('username')">Change</button></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($userInfo['email']); ?></td>
                    <td><button class="btn btn-primary btn-sm" onclick="editField('email')">Change</button></td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td><?php echo htmlspecialchars($userInfo['firstName']); ?></td>
                    <td><button class="btn btn-primary btn-sm" onclick="editField('firstName')">Change</button></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><?php echo htmlspecialchars($userInfo['lastName']); ?></td>
                    <td><button class="btn btn-primary btn-sm" onclick="editField('lastName')">Change</button></td>
                </tr>
                <tr>
                    <th>User Type</th>
                    <td><?php echo htmlspecialchars($userInfo['userType']); ?></td>
                    <td></td>
                </tr>
                <!-- Additional fields based on user type -->
                <?php if ($userInfo['userType'] === 'University'): ?>
                    <tr>
                        <th>University Name</th>
                        <td><?php echo htmlspecialchars($userInfo['university_name']); ?></td>
                        <td><button class="btn btn-primary btn-sm" onclick="editField('university_name')">Change</button></td>
                    </tr>
                    <tr>
                        <th>Faculty</th>
                        <td><?php echo htmlspecialchars($userInfo['faculty']); ?></td>
                        <td><button class="btn btn-primary btn-sm" onclick="editField('faculty')">Change</button></td>
                    </tr>
                <?php elseif ($userInfo['userType'] === 'External'): ?>
                    <tr>
                        <th>Company</th>
                        <td><?php echo htmlspecialchars($userInfo['company']); ?></td>
                        <td><button class="btn btn-primary btn-sm" onclick="editField('company')">Change</button></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td><?php echo htmlspecialchars($userInfo['role']); ?></td>
                        <td><button class="btn btn-primary btn-sm" onclick="editField('role')">Change</button></td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>

    <form method="POST" id="editForm" style="display:none;">
        <div class="form-group mt-4">
            <label for="new_value" id="editLabel"></label>
            <input type="text" id="new_value" name="new_value" class="form-control" required>
            <input type="hidden" id="field" name="field">
        </div>
        <button type="submit" name="update_field" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Cancel</button>
    </form>
</div>

<!-- Footer -->
<footer class="bg-dark-custom text-white py-4">
    <div class="container text-center">
        <p class="mb-0">OpenBook™ LLC is a registered company in England & Wales under the Companies House.</p>
    </div>
</footer>

<script>
    function editField(field) {
        document.getElementById('editForm').style.display = 'block';
        document.getElementById('field').value = field;
        const labels = {
            username: 'Enter new username:',
            email: 'Enter new email:',
            firstName: 'Enter new first name:',
            lastName: 'Enter new last name:',
            university_name: 'Enter new university name:',
            faculty: 'Enter new faculty:',
            company: 'Enter new company:',
            role: 'Enter new role:'
        };
        document.getElementById('editLabel').innerText = labels[field];
    }

    function cancelEdit() {
        document.getElementById('editForm').style.display = 'none';
    }
</script>
</body>
</html>
