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

    newValue = Math.max(newValue, 0);

    inputElement.value = newValue;
}

// JavaScript for Bicol Express modal
$('#addCartBtnBicolExpress').click(function () {
    // Get the data from the modal
    var itemName = "Bicol Express"; // You can modify this dynamically based on modal content
    var price = 60.00; // You can modify this dynamically based on modal content
    var quantity = $('#quantityInputBicolExpress').val();

    // Send an AJAX request to add to cart
    $.ajax({
        type: 'POST',
        url: 'process_cart.php', // Replace with your PHP file handling the cart logic
        data: {
            addCartBtn: true, // Make sure this matches the PHP check
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

