$(document).ready(function () {
    $("a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
    
            var hash = this.hash;
            var target = $(hash);
    
            if (target.length) {
                target[0].scrollIntoView({ behavior: 'smooth' });
            }
        }
    });

    var foodOffset = $("#food").offset().top;
    var drinksOffset = $("#drinks").offset().top;

    $(document).scroll(function () {
        var scrollPosition = $(document).scrollTop();

        if (scrollPosition >= foodOffset && scrollPosition < drinksOffset) {
            $("#menu-buttons-container a").removeClass("active");
            $("#food-button").addClass("active");
        } else if (scrollPosition >= drinksOffset) {
            $("#menu-buttons-container a").removeClass("active");
            $("#drinks-button").addClass("active");
        } else {
            $("#menu-buttons-container a").removeClass("active");
        }
    });
});

$(document).ready(function () {
    $('#quantity').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      modal.find('#quantityInput').val(1);
    });
    $('#addCartBtn').click(function () {
      var quantity = $('#quantityInput').val();
      $('#quantity').modal('hide');
    });
  });
function updateQuantity(inputId, increment) {
    var inputElement = document.getElementById(inputId);
    var currentValue = parseInt(inputElement.value);
    var newValue = currentValue + increment;
    newValue = Math.max(newValue, 1);
    inputElement.value = newValue;
}