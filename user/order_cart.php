<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="/GitHub/ICS2608-FinalOutput/css/order_cart.css" rel="stylesheet" >

</head>

<body>
    <?php include '../includes/header-user.php';
    ?>
    <h1>Your Cart</h1>
<br>

<div class="container">
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
        <div>
          <p>Liempo with rice</p>
        </div>
      </div>
    </td>
    <td class="tbl-qty-txt">
      <button class="btn-plus">+</button>
       3 <button class="btn-minus">-</button></td>

    <td class="tbl-prc-txt">₱231</td>

  </tr>

</table>
</div>
<div class="col-2">
<button class="btn-add">Add Order</button>
<br><br>
<button class="btn-clr">Clear Cart</button>
</div>
<div class="col-2"></div>

</div><br>
<div class="row">
<div class="col-2"></div>
<div class="col-3 col-ttl"><p>Total</p></div>
<div class="col-3 col-prc"><p>₱231</p></div>
<div class="col-2"></div>
<div class="col-2"></div>
</div>

<div class="row">
  <div class="col-2"></div>
  <div class="col-6 col-checkout"><hr><button class="btn-checkout">PROCEED TO CHECKOUT</button></div>
  <div class="col-2"></div>
  <div class="col-2"></div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
</body>

</html>