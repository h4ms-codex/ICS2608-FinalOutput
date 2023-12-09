<?php include '../admin/connection.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Cart</title>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    function redirectcheckout() {
      window.open("checkout.php", "_self")
    }

    function redirectmenu() {
      window.open("menu.php", "_self")
    }

    $(document).ready(function() {
      $(".btn-plus").on("click", function() {
        updateQuantity($(this), 1);
      });

      $(".btn-minus").on("click", function() {
        updateQuantity($(this), -1);
      });
    });

    function updateQuantity(button, change) {
      var numElement = button.siblings(".num");
      var currentQuantity = parseInt(numElement.text());
      var newQuantity = currentQuantity + change;

      if (newQuantity >= 1) {
        numElement.text(newQuantity);
        updateTotalPrice(button);
      }
    }

    function updateTotalPrice(button) {
      var quantity = parseInt(button.siblings(".num").text());
      var pricePerItem = parseFloat(button.closest("tr").find(".tbl-prc-txt").text().replace('₱', ''));
      var total = quantity * pricePerItem;
      button.closest("tr").find(".tbl-prc-txt").text('₱' + total.toFixed(2));
      updateTotalAmount();
    }

    function updateTotalAmount() {
      var totalAmount = 0;
      $(".tbl-prc-txt").each(function() {
        var price = parseFloat($(this).text().replace('₱', ''));
        totalAmount += price;
      });

      $("#total_amount").text('₱' + totalAmount.toFixed(2));
    }
  </script>
</head>

<body>
  <?php include '../includes/header-user.php'; ?>
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

          <?php foreach ($rows as $row) { ?>
            <tr>
              <td class="item-td">
                <div class="item-info">
                  <button class="btn-x">
                    <a href="delete.php?deleteID=<?php echo $row['order_ID']; ?>"> x </a>
                  </button>
                  <div class="test-item-data">
                    <p><?php echo $row['item_name']; ?></p>
                  </div>
                </div>
              </td>
              <td class="tbl-qty-txt">
                <span class="btn-plus">+</span>
                <span class="num"><?php echo $row['quantity']; ?></span>
                <span class="btn-minus">-</span>
              </td>
              <td class="tbl-prc-txt">₱<?php echo $row['price']; ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-2">
        <button onclick="redirectmenu()" class="btn-add">Add Order</button>
        <br><br>
        <button class="btn-clr"><a href="clear.php?clearID=<?php echo $row['order_ID']; ?>"> Clear Cart </a></button>
      </div>
      <div class="col-2"></div>
    </div><br>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-3 col-ttl">
        <p>Total</p>
      </div>
      <div class="col-3 col-prc">
        <p name="total_amount" id="total_amount">₱<?php echo $total_amount; ?></p>
      </div>
      <div class="col-2"></div>
      <div class="col-2"></div>
    </div>
    <tr>

      <?php

      $total = 0;

      $sql = "SELECT * FROM order_tdetails";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $order_ID = $row['order_ID'];
        $quantity = $row['quantity'];
        $price = $row['price'];

        // Calculate total price for each item
        $itemTotal = $quantity * $price;

        // Add the item total to the overall total
        $total += $itemTotal;

        echo '
    <td class="item-td" >
      <div class="item-info">
      <button class="btn-x">
        <a href="delete.php?deleteID=' . $order_ID . '"> x </a>
      </button>
        <div class="test-item-data">
          <p href="order_cart?order_ID=' . $order_ID . '">' . $order_ID . '</p>
        </div>
      </div>
    </td>
    <td class="tbl-qty-txt">
      <button class="plus">+</button>
      


      <span class="num" data-order-id="' . $order_ID . '">' . $quantity . '</span>


      <button class="minus">-</button></td>

    <td class="tbl-prc-txt"> ₱ ' . $price . ' </td>

  </tr>';
      }

      ?>



      <!-- ... (your existing HTML code) ... -->



      <script>
        document.addEventListener("DOMContentLoaded", function() {
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
            // Make an AJAX request to update the quantity in the database
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_quantity.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
              if (xhr.readyState == 4 && xhr.status == 200) {
                // Quantity updated successfully, update the local quantity and total amount
                quantities[index] = newQuantity;
                updateTotalAmount();
              }
            };
            xhr.send(`order_id=${orderID}&new_quantity=${newQuantity}`);
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




      <!-- ... (your existing HTML code) ... -->




      </table>
  </div>
  <div class="col-2">
    <button onclick="redirectmenu()" class="btn-add">Add Order</button>
    <br><br>

    <button class="btn-clr"><a href="clear.php?clearID=' . $order_ID . '"> Clear Cart </a></button>'

  </div>
  <div class="col-2"></div>

  </div><br>
  <div class="row">
    <div class="col-2"></div>
    <div class="col-3 col-ttl">
      <p>Total</p>
    </div>
    <div class="col-3 col-prc">
      <p name="tot_amount" id="tot_amount">₱<?php echo number_format($total, 2); ?></p>
    </div>





    <div class="col-2"></div>
    <div class="col-2"></div>
  </div>

  <div class="row">
    <div class="col-2"></div>
    <div class="col-6 col-checkout">
      <hr><button onclick="redirectcheckout()" class="btn-checkout">PROCEED TO CHECKOUT</button>
    </div>
    <div class="col-2"></div>
    <div class="col-2"></div>
  </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <div class="row">
    <div class="col-2"></div>
    <div class="col-6 col-checkout">
      <hr>
      <button onclick="redirectcheckout()" class="btn-checkout">PROCEED TO CHECKOUT</button>
    </div>
    <div class="col-2"></div>
    <div class="col-2"></div>
  </div>
  </div>
</body>

</html>