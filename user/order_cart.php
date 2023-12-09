<?php
include ("connectionnn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Cart</title>

    <script>
      function redirectcheckout() {
        window.open("checkout.php", "_self")
      }

      function redirectmenu() {
        window.open("menu.php", "_self")
      }
    </script>

</head>

<body>
    <?php include '../includes/header-user.php';
    ?>
    <br><br>
    <h1>Your Cart</h1>
<br>

<div class="ordercart-container">
<div class="row">
<div class="col-2"></div>
<div class="col-6">
  
<table>
  <tr>
    <th class="item-th">Item</th>
    <th class="qty-th">Quantity</th>
    <th class="price-th">Price</th>
  </tr>

  <tr>
  
  <?php
    
    $total = 0;

    $sql = "SELECT * FROM order_cart";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $item_name =$row['item_name'];
        $quantity =$row['quantity'];
        $price =$row['price'];

    
    $itemTotal = $quantity * $price;

    $total += $itemTotal;

      echo '
    <td class="item-td" >
      <div class="item-info">
      <button class="btn-x">
        <a href="delete.php?deleteID=' . $item_name . '"> x </a>
      </button>
        <div class="test-item-data">
          <p href="order_cart?$item_name=' . $item_name . '">'. $item_name .'</p>
        </div>
      </div>
    </td>
    <td class="tbl-qty-txt">
      <button class="plus">+</button>
      


      <span class="num" data-order-id="' . $item_name .'">' . $quantity . '</span>


      <button class="minus">-</button></td>

    <td class="tbl-prc-txt"> ₱ ' . $price . ' </td>

  </tr>';
    }

      ?>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const plusButtons = document.querySelectorAll(".plus");
    const minusButtons = document.querySelectorAll(".minus");
    const quantityElements = document.querySelectorAll(".num");
    const priceElements = document.querySelectorAll(".tbl-prc-txt");
    const totalAmountElement = document.getElementById("tot_amount");

    let quantities = Array.from(quantityElements).map((element) => parseInt(element.innerText));
    const prices = Array.from(priceElements).map((element) => parseFloat(element.innerText.replace('₱', '').trim()));

    function updateTotalAmount() {
      let total = 0;
      for (let i = 0; i < quantities.length; i++) {
        total += quantities[i] * prices[i];
      }
      totalAmountElement.innerText = '₱' + total.toFixed(2);
    }



    function updateQuantity(orderID, newQuantity, index) {

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "update_quantity.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {

      quantities[index] = newQuantity;
      updateTotalAmount();
    }
  };
  xhr.send(`$item_name=${orderID}&new_quantity=${newQuantity}`);
}

    

    plusButtons.forEach((button, index) => {
      button.addEventListener("click", () => {
        quantities[index]++;
        quantityElements[index].innerText = quantities[index];
        updateQuantity(quantityElements[index].dataset.orderId, quantities[index], index);
      });
    });
    
    minusButtons.forEach((button, index) => {
      button.addEventListener("click", () => {
        if (quantities[index] > 1) {
          quantities[index]--;
          quantityElements[index].innerText = quantities[index];
          updateQuantity(quantityElements[index].dataset.orderId, quantities[index], index);
        }
      });
    });
  });
</script>



</table>
</div>
<div class="col-2">
<button onclick="redirectmenu()" class="btn-add">Add Order</button>
<br><br>

<button class="btn-clr"><a href="clear.php?clearID=' . $item_name . '"> Clear Cart </a></button>'

</div>
<div class="col-2"></div>

</div><br>
<div class="row">
<div class="col-2"></div>
<div class="col-3 col-ttl"><p>Total</p></div>
<div class="col-3 col-prc"><p name="tot_amount" id="tot_amount">₱<?php echo number_format($total, 2); ?></p></div>





<div class="col-2"></div>
<div class="col-2"></div>
</div>

<div class="row">
  <div class="col-2"></div>
  <div class="col-6 col-checkout"><hr><button onclick="redirectcheckout()" class="btn-checkout">PROCEED TO CHECKOUT</button></div>
  <div class="col-2"></div>
  <div class="col-2"></div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>