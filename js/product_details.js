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


$('#addCartBtnBicolExpress').click(function () {
    var itemName = "Bicol Express"; 
    var price = 60.00; 
    var quantity = $('#quantityInputBicolExpress').val();

    $.ajax({
        type: 'POST',
        url: 'process_cart.php',
        data: {
            addCartBtn: true,
            item_name: itemName,
            price: price,
            quantity: quantity
        },
        success: function (response) {
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

