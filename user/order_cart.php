



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Cart</title>

    <link href="/GitHub/ICS2608-FinalOutput/css/order_cart.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KoHo&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kreon&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KohSantepheap&display=swap">

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
  
    
    <td class="item-td" >
      <div class="item-info">
      <button class="btn-x">x</button>
        <div class="test-item-data">
          <p>Liempo with rice</p>
        </div>
      </div>
    </td>
    <td class="tbl-qty-txt">
      <button class="btn-plus">+</button>
       3 <button class="btn-minus">-</button></td>

    <td class="tbl-prc-txt">₱231.00</td>

  </tr>

</table>
</div>
<div class="col-2">
<button onclick="redirectmenu()" class="btn-add">Add Order</button>
<br><br>
<button class="btn-clr">Clear Cart</button>
</div>
<div class="col-2"></div>

</div><br>
<div class="row">
<div class="col-2"></div>
<div class="col-3 col-ttl"><p>Total</p></div>
<div class="col-3 col-prc"><p>₱231.00</p></div>
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