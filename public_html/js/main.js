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
    $(".dropdown-item").click(function() {
        var selectedText = $(this).text();
        console.log("Dropdown item clicked: " + selectedText);
        $("#dropdownMenuButton").text(selectedText);
    });

});
