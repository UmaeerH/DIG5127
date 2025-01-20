// Run scripts after the DOM has loaded
document.addEventListener('DOMContentLoaded', function () {

});
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

// Sign up dropdow // 

const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select');
    const caret = dropdown.querySelector('.caret');
    const menu = dropdown.querySelector('.menu');
    const options = dropdown.querySelectorAll('.menu li');
    const selected = dropdown.querySelector('.selected');

    select.addEventListener('click', () => {
        select.classList.toggle('select-clicked');
        caret.classList.toggle('caret-rotate');
        menu.classList.toggle('menu-open');
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            selected.innerText = option.innerText;
            select.classList.remove('select-clicked');
            caret.classList.remove('caret-rotate');
            menu.classList.remove('menu-open');

            options.forEach(opt => opt.classList.remove('active'));
            option.classList.add('active');
        });
    });
});
