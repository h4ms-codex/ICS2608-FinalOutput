<?php
include ("connection.php");
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
    
    $sql = "SELECT * FROM order-tdetails";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $order_ID =$row['order_ID'];
        $quantity =$row['quantity'];
        $price =$row['price'];

      echo '
    <td class="item-td" >
      <div class="item-info">
      <button class="btn-x">
        <a href="delete.php?deleteID=' . $order_ID . '"> x </a>
      </button>
        <div class="test-item-data">
          <p><!--<?php echo $order_ID; ?>--> Liempo with rice</p>
        </div>
      </div>
    </td>
    <td class="tbl-qty-txt">
      <span class="btn-plus">+</span>
      <span class="num"><!--<?php echo $quantity; ?>-->3</span>
      <span class="btn-minus">-</span></td>

    <td class="tbl-prc-txt"><!-- ₱<?php echo $price; ?> -->₱231.00</td>

  </tr>';
    }

      ?>

<script>
    const btn-plus = document.querySelector(".btn-plus"),
    btn-minus = document.querySelector(".btn-minus"),
    num = document.querySelector(".num");

  let a = $quantity;

  btn-plus.addEventListener("click", ()=>{
    a++;
    num.innerText = a;
    console.log(a);
  });

  btn-minus.addEventListener("click", ()=>{
    if (a > 1){
    a--;
    num.innerText = a;
    }
  });
  </script>

</table>
</div>
<div class="col-2">
<button onclick="redirectmenu()" class="btn-add">Add Order</button>
<br><br>
<button class="btn-clr"><a href="clear.php?clearID=' . $order_ID . '"> Clear Cart </a></button>
</div>
<div class="col-2"></div>

</div><br>
<div class="row">
<div class="col-2"></div>
<div class="col-3 col-ttl"><p>Total</p></div>
<div class="col-3 col-prc"><p><!-- ₱<?php echo $total; ?> -->₱231.00</p></div>
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