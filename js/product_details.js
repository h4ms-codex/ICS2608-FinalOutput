$(document).ready(function () {
    // Food popups
    $('#food .card').hover(
        function () {
            $(this).find('.popup').fadeIn();
        },
        function () {
            $(this).find('.popup').fadeOut();
        }
    );

    // Drinks popups
    $('#drinks .card').hover(
        function () {
            $(this).find('.popup').fadeIn();
        },
        function () {
            $(this).find('.popup').fadeOut();
        }
    );
});
