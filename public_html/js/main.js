// Load DOM before anything javascript
document.addEventListener('DOMContentLoaded', function () {

    // Report an issue form
    // Report form
    $('.card').click(function () {
        const issue = $(this).data('issue');
        $('.hidden-form').show();
        $('#details').focus().attr('placeholder', `Describe the issue: ${issue}`);
    });
    // Report sent 
    $('#report-form').submit(function (event) {
        event.preventDefault();
        alert('Thank you for reporting the issue. We will address it as soon as possible.');
        $('#report-form')[0].reset();
        $('.hidden-form').hide();
    });





    // Sign Up Dropdown menu
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

});
