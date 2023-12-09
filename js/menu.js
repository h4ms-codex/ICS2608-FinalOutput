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

$('[id^="quantity"]').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var itemName = button.data('item-name');
    var modal = $(this);
    modal.find('#itemNamePlaceholder').text(itemName);
});

// JavaScript for Bicol Express modal
$('#addCartBtnBicolExpress').click(function () {
    // Get the data from the modal
    var itemName = "Bicol Express"; // You can modify this dynamically based on modal content
    var price = 60.00; // You can modify this dynamically based on modal content
    var quantity = $('#quantityInputBicolExpress').val();

    // Send an AJAX request to add to cart
    $.ajax({
        type: 'POST',
        url: 'order_cart.php', // Replace with your PHP file handling the cart logic
        data: {
            addCartBtn: true,
            item_name: itemName,
            price: price,
            quantity: quantity
        },
        success: function (response) {
            // Check the response and redirect to menu.php
            if (response === 'success') {
                alert('Item added to cart successfully!');
                window.location.href = 'menu.php';
            } else {
                alert('Failed to add item to cart. Please try again.');
            }
        },
        error: function () {
            alert('An error occurred. Please try again.');
        }
    });
});

