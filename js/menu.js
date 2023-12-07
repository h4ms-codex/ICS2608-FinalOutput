$(document).ready(function () {
    // Smooth scrolling when clicking on navigation links
    $('a.nav-link').on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {
                window.location.hash = hash;
            });
        }
    });

    // Change color of navigation links based on scroll position
    $(window).scroll(function () {
        var scrollDistance = $(window).scrollTop();

        $('.menu-section').each(function (i) {
            if ($(this).position().top <= scrollDistance) {
                $('a.nav-link.active').removeClass('active');
                $('a.nav-link').eq(i).addClass('active');
            }
        });
    }).scroll();
});