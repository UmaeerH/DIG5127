
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">OpenBook</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Sign Up</h2>
        <form method="POST">
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

<footer class="text-light py-4" style="background-color: #008080;">
    <div class="container text-center">
        <p>&copy; 2025 OpenBook. All rights reserved.</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="index.php" class="text-light">Home</a></li>
            <li class="list-inline-item">|</li>
            <li class="list-inline-item"><a href="contact.php" class="text-light">Contact Us</a></li>
            <li class="list-inline-item">|</li>
            <li class="list-inline-item"><a href="legal.php" class="text-light">Legal</a></li>
        </ul>
    </div>
</footer>

<script>
    const userTypeField = document.querySelector('[name="user_type"]');
    const additionalFields = document.getElementById('additional-fields');

    userTypeField.addEventListener('change', () => {
        const userType = userTypeField.value;
        additionalFields.innerHTML = '';

        if (userType === 'Student') {
            additionalFields.innerHTML = `
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
                </div>`;
        } else if (userType === 'Staff') {
            additionalFields.innerHTML = `
                <div class="form-group">
                    <label for="university_name">University Name</label>
                    <input type="text" name="university_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="faculty">Faculty</label>
                    <input type="text" name="faculty" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" name="department" class="form-control" required>
                </div>`;
        } else if (userType === 'Enterprise') {
            additionalFields.innerHTML = `
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" name="company" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" class="form-control" required>
                </div>`;
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
