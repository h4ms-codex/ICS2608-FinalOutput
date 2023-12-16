<?php
include("../admin/connection.php");

$sql = "SELECT * FROM order_cart";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalPrice = 0;
foreach ($rows as $row) {
    $totalPrice += $row['price'];
}

try {
    $customerSql = "SELECT * FROM customer_details ORDER BY customer_id DESC LIMIT 1";
    $customerStmt = $conn->prepare($customerSql);
    $customerStmt->execute();
    $customerDetails = $customerStmt->fetch(PDO::FETCH_ASSOC);

    $orderSql = "SELECT * FROM order_cart ORDER BY order_id DESC LIMIT 1";
    $orderStmt = $conn->prepare($orderSql);
    $orderStmt->execute();
    $orderDetails = $orderStmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/order_confirmation.css">
    <style>
        @media (min-width: 768px) {
            .custom-container-width {
                width: 75% !important;
            }
        }
    </style>
</head>

<body>
    <?php include '../includes/header-user.php';
    ?>

    <div class="container custom-container custom-container-width mt-3 mb-3">
        <div class="pt-3">
            <h2 class="font-kohsan"><b>Order #<?php echo $orderDetails['order_id']; ?></b></h2>
        </div>

        <?php if ($customerDetails) : ?>
            <div class="pb-5">
                <div class="row">
                    <div class="col-12">
                        <strong>Date:</strong> <?php echo $customerDetails['order_date']; ?><br>
                    </div>
                    <div class="col-12">
                        <strong>Name:</strong> <?php echo $customerDetails['firstname'] . ' ' . $customerDetails['lastname']; ?><br>
                    </div>
                    <div class="col-12">
                        <strong>Phone Number:</strong> <?php echo $customerDetails['phone_number']; ?><br>
                    </div>
                    <div class="col-12">
                        <strong>Email:</strong> <?php echo $customerDetails['email']; ?><br>
                    </div>
                    <div class="col-12">
                        <strong>Address:</strong> <?php echo $customerDetails['address']; ?><br>
                    </div>
                    <div class="col-12">
                        <strong>Payment Method:</strong> <?php echo $customerDetails['payment_method']; ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <p>No customer details found.</p>
        <?php endif; ?>
    </div>

    <div class="container custom-container custom-container-width mt-3">
        <div class="pt-3">
            <h2 class="font-kohsan"><b>Order Summary</b></h2>
        </div>
        <div class="row">
            <div class="col-4">
                <h5 class="card-title">Item</h5>
            </div>
            <div class="col-4">
                <h5 class="card-title">Quantity</h5>
            </div>
            <div class="col-4">
                <h5 class="card-title">Price</h5>
            </div>
        </div>
        <?php if (!empty($rows)) {
            foreach ($rows as $row) { ?>
                <div class="row">
                    <div class="col-4">
                        <p class="card-text"><?php echo $row['item_name']; ?></p>
                    </div>
                    <div class="col-4">
                        <input type="number" name="quantity" id="quantityInput_<?php echo $row['order_id']; ?>" value="<?php echo $row['quantity']; ?>" class="mx-2 custom-input" readonly />
                    </div>
                    <div class="col-4">
                        <p class="card-text"><?php echo $row['price']; ?></p>
                    </div>
                </div>
        <?php }
        } else {
            echo '<div class="row text-center"><div class="col">Your cart is empty</div></div>';
        } ?>
        <div class="d-flex justify-content-center pt-3">
            <svg width="750" height="2" viewBox="0 0 775 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="-0.00064507" y1="1.5" x2="774.999" y2="0.500142" stroke="black" />
            </svg>
        </div>
        <div class="row pt-3 ">
            <div class="col">
                <h4 class="font-kohO"><b>Total</b></h4>
            </div>
            <div class="col-4">
                <p><?php echo $totalPrice; ?>.00</p>
            </div>
        </div>
    </div>

    </div>
    </div>
</body>

</html>