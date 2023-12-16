<?php
include("../admin/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["save_all"])) {
    foreach ($_POST['new_quantities'] as $orderId => $newQuantity) {
      try {
        $itemName = $_POST['item_names'][$orderId];
        $newPrice = calculateNewPrice($itemName, $newQuantity);

        $sql = "UPDATE order_cart
                        SET quantity = :quantity,
                            price = :price
                        WHERE order_id = :order_id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':quantity', $newQuantity, PDO::PARAM_INT);
        $stmt->bindParam(':price', $newPrice, PDO::PARAM_INT);
        $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);

        $stmt->execute();
      } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
    }

    header("Location: order_cart.php");
    exit();
  } elseif (isset($_POST["save"])) {
    $orderId = $_POST['order_id'];
    $newQuantity = $_POST['new_quantity'];

    try {
      $itemName = $_POST['item_names'][$orderId];
      $newPrice = calculateNewPrice($itemName, $newQuantity);

      $sql = "UPDATE order_cart
                    SET quantity = :quantity,
                        price = :price
                    WHERE order_id = :order_id";

      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':quantity', $newQuantity, PDO::PARAM_INT);
      $stmt->bindParam(':price', $newPrice, PDO::PARAM_INT);
      $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);

      $stmt->execute();

      header("Location: order_cart.php");
      exit();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }
}

$sql = "SELECT * FROM order_cart";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

function calculateNewPrice($item_name, $newQuantity)
{
  $itemPrices = [
    'Bicol Express' => 60.00,
    'Chicken Curry' => 80.00,
    'Giniling' => 80.00,
    'Gulay' => 60.00,
    'Iced Tea' => 15.00,
    'Mountain Dew' => 20.00,
    'Coca Cola' => 25.00,
  ];

  $originalPrice = isset($itemPrices[$item_name]) ? $itemPrices[$item_name] : 0;
  $newPrice = $originalPrice * $newQuantity;
  return $newPrice;
}

$totalPrice = 0;
foreach ($rows as $row) {
  $totalPrice += $row['price'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Cart</title>
  <link rel="stylesheet" href="../css/order_confirmation.css">
</head>

<body>
  <?php include '../includes/header-user.php'; ?>

  <form method="post" action="order_cart.php" onsubmit="return saveAllQuantities()">
    <?php foreach ($rows as $row) { ?>
      <input type="hidden" name="new_quantities[<?php echo $row['order_id']; ?>]" id="new_quantity_<?php echo $row['order_id']; ?>" value="<?php echo $row['quantity']; ?>">
      <input type="hidden" name="item_names[<?php echo $row['order_id']; ?>]" value="<?php echo $row['item_name']; ?>">
    <?php } ?>
    <nav class="navbar navbar-menu navbar-expand-lg sticky-top pt-4">
      <div class="container d-md-none">
        <div class="d-flex align-items-center justify-content-between">
          <div class="row pl-sm-5">
            <div class="col">
              <div class="text-center">
                <a href="../user/menu.php" class="custom-btn-sm font-koho">
                  <button type="button" class="custom-btn-sm font-koho">
                    Add Order
                  </button>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="text-center font-koho">
                <a href="clear.php?clearID=<?php echo $row['order_id']; ?>" class="custom-btn-sm font-koho">
                  <button type="button" class="custom-btn-sm font-koho">
                    Clear
                  </button>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="text-center">
                <button type="submit" class="custom-btn-sm font-koho" name="save_all">
                  Save
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="container d-flex">
      <div class="container custom-container-width pr-0">
        <div class="card custom-card">
          <div class="card-body text-center">
            <div class="row">
              <div class="col-4">
                <h5 class="card-title">Item</h5>
              </div>
              <div class="col-4 pl-md-0 pl-lg-2">
                <h5 class="card-title">Quantity</h5>
              </div>
              <div class="col-4 pl-lg-0">
                <h5 class="card-title">Price</h5>
              </div>
            </div>
          </div>

          <?php if (!empty($rows)) {
            foreach ($rows as $row) { ?>
              <div class="card-body text-center">
                <div class="row d-flex align-items-center">
                  <a class="text-light" href="delete.php?deleteID=<?php echo $row['order_id']; ?>&quantity=<?php echo $row['quantity']; ?>">
                    <button type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 40 40" fill="none">
                        <circle cx="20" cy="20" r="18.5" fill="#F2E2D4" stroke="black" stroke-width="3" />
                        <line x1="27.6659" y1="11.82" x2="11.6255" y2="25.1534" stroke="black" stroke-width="3" />
                        <line x1="11.6806" y1="12.2278" x2="27.6806" y2="26.8944" stroke="black" stroke-width="3" />
                      </svg>
                    </button>
                  </a>
                  <div class="col-3 pl-0">
                    <p class="card-text"><?php echo $row['item_name']; ?></p>
                  </div>
                  <div class="col-2">
                    <button type="button" onclick="updateQuantity('quantityInput_<?php echo $row['order_id']; ?>', 1, <?php echo $row['order_id']; ?>)">
                      <svg width="23" height="23" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="20.4912" r="18.5" fill="#F2E2D4" stroke="black" stroke-width="3" />
                        <line x1="19.3334" y1="9.82471" x2="19.3334" y2="29.8247" stroke="black" stroke-width="4" />
                        <line x1="9.33337" y1="20.3247" x2="30.6667" y2="20.3247" stroke="black" stroke-width="3" />
                      </svg>
                    </button>
                  </div>
                  <div class="col-1 pl-0">
                    <input type="number" name="quantity" id="quantityInput_<?php echo $row['order_id']; ?>" value="<?php echo $row['quantity']; ?>" class="mx-2 custom-input" readonly />
                  </div>
                  <div class="col-1">
                    <button type="button" onclick="updateQuantity('quantityInput_<?php echo $row['order_id']; ?>', -1, <?php echo $row['order_id']; ?>)">
                      <svg width="23" height="23" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="20.4912" r="18.5" fill="#F2E2D4" stroke="black" stroke-width="3" />
                        <line x1="9.33337" y1="20.3247" x2="30.6667" y2="20.3247" stroke="black" stroke-width="3" />
                      </svg>
                    </button>
                  </div>
                  <div class="col-4 pl-lg-5 pl-md-4">
                    <p class="card-text"><?php echo $row['price']; ?></p>
                  </div>
                </div>
              </div>
          <?php }
          } else {
            echo '<div class="row text-center"><div class="col">Your cart is empty</div></div>';
          } ?>
        </div>

        <div class="row pt-4 d-flex align-items-center justify-content-between">
          <div class="col">
            <h4 class="font-kohsan"><b>Total Price</b></h4>
          </div>
          <div class="col text-right pr-md-5">
            <p><?php echo $totalPrice; ?>.00</p>
          </div>
        </div>

        <div class="d-flex justify-content-center">
          <svg width="750" height="2" viewBox="0 0 775 2" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="-0.00064507" y1="1.5" x2="774.999" y2="0.500142" stroke="black" />
          </svg>
        </div>

        <div class="col p-3 pb-5 d-flex justify-content-center">
          <div class="text-center font-koho">
            <a href="checkout.php">
              <button type="button" class="custom-btn-check font-koho">Proceed to Checkout</button>
          </div>
          </a>
        </div>
      </div>

      <div class="container w-50 pl-3 d-none d-md-block">
        <div class="d-flex align-items-center justify-content-between">
          <div class="row pl-3">
            <div class="text-center">
              <a href="../user/menu.php">
                <button type="button" class="custom-btn font-koho">
                  Add Order
                </button>
              </a>
            </div>
            <div class="text-center mt-2">
              <a href="clear.php?clearID=<?php echo $row['order_id']; ?>">
                <button type="button" class="custom-btn font-koho">
                  Clear
                </button>
              </a>
            </div>
            <div class="text-center mt-2">
              <button type="submit" class="custom-btn font-koho" name="save_all">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script type="text/javascript">
    var orderRows = <?php echo json_encode($rows); ?>;
  </script>
  <script src="../js/order_cart.js"></script>
</body>

</html>