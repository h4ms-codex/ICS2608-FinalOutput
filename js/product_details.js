  $(document).ready(function () {
    // Quantity modal
    $('#quantity').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var modal = $(this);

      // Clear previous values
      modal.find('#quantityInput').val(1);
    });

    // Add to Cart button in the quantity modal
    $('#addCart').click(function () {
      var quantity = $('#quantityInput').val();
      // Perform actions with the selected quantity (e.g., add to cart logic)

      // Close the modal
      $('#quantityModal').modal('hide');
    });
  });


    function changeValue(inputId, delta) {
        var inputValue = document.getElementById(inputId);
        var currentValue = parseInt(inputValue.value);

        currentValue = isNaN(currentValue) || currentValue < 1 ? 1 : currentValue;

        var newValue = currentValue + delta;
        inputValue.value = newValue >= 1 ? newValue : 1;
    }