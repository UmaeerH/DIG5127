// Run scripts after the DOM has loaded
document.addEventListener('DOMContentLoaded', function () {


    // Report an issue form
    $(document).ready(function () {
        $('.card').click(function () {
            const issue = $(this).data('issue');
            $('.hidden-form').show();
            $('#details').focus().attr('placeholder', `Describe the issue: ${issue}`);
        });
    // Issue reported successfully
        $('#report-form').submit(function (event) {
            event.preventDefault();
            alert('Thank you for reporting the issue. We will address it as soon as possible.');
            $('#report-form')[0].reset();
            $('.hidden-form').hide();
        });
    });
    

});