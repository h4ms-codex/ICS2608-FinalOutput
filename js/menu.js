$(document).ready(function () {
    $("a").on('click', function (event) {
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
});

$(document).ready(function () {
    var foodOffset = $("#food").offset().top;
    var drinksOffset = $("#drinks").offset().top;
  
    $(document).scroll(function () {
      var scrollPosition = $(document).scrollTop();
  
      if (scrollPosition >= foodOffset && scrollPosition < drinksOffset) {
        $("#food-button").addClass("active");
        $("#drinks-button").removeClass("active");
      } else if (scrollPosition >= drinksOffset) {
        $("#food-button").removeClass("active");
        $("#drinks-button").addClass("active");
      } else {
        $("#food-button").removeClass("active");
        $("#drinks-button").removeClass("active");
      }
    });
  });
  