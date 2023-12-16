function updateQuantity(inputId, change, orderId) {
    var inputElement = document.getElementById(inputId);
    var newQuantityElement = document.getElementById('new_quantity_' + orderId);
    var priceElement = document.getElementById('price_' + orderId);

    var currentQuantity = parseInt(inputElement.value);
    var newQuantity = currentQuantity + change;

    if (newQuantity < 0) {
        newQuantity = 0;
    }

    inputElement.value = newQuantity;
    newQuantityElement.value = newQuantity;

    var newPrice = calculateNewPrice(orderId, newQuantity);

    priceElement.innerText = newPrice.toFixed(2);

    console.log('Order ID:', orderId, 'New Quantity:', newQuantity, 'New Price:', newPrice);
}

function calculateNewPrice(orderId, newQuantity) {
    var existingPrice = orderRows.find(row => row.order_id === orderId).price;

    var newPrice = existingPrice * newQuantity;

    return newPrice;
}
