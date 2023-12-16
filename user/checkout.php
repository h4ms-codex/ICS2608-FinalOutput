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

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $payment_method = $_POST["payment_method"];

    try {
        $sql = "INSERT INTO customer_details (firstname, lastname, phone_number,  email, address, payment_method, order_date)
                VALUES (:firstname, :lastname, :phone_number,  :email, :address, :payment_method, CURRENT_TIMESTAMP)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':payment_method', $payment_method, PDO::PARAM_STR);

        $stmt->execute();

        header("Location: order_confirmation.php");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KoHo&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/checkout.css">
</head>

<body class="font-koho">
    <?php include '../includes/header-user.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 pb-3">
                <div class="container custom-container">
                    <h2>Delivery Information:</h2>
                    <form action="checkout.php" method="post">
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="custom-text-box" id="firstname" name="firstname" required>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="custom-text-box" id="lastname" name="lastname" required>
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Mobile Number:</label>
                            <input type="tel" class="custom-text-box" id="phone_number" name="phone_number" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address details:</label>
                            <textarea class="custom-text-box" id="address" name="address" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="custom-text-box" id="email" name="email" required>
                        </div>

                        <div class="form-group pb-3">
                            <label for="payment_method">Payment Method:</label>
                            <select class="form-control" id="payment_method" name="payment_method">
                                <option value="" disabled selected>Select Payment Method</option>
                                <option value="COD">Cash on Delivery</option>
                                <option value="Gcash">GCash</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>
                        <div class="col d-flex justify-content-center pb-sm-3">
                            <button type="submit" name="submit" class="custom-btn-check font-koho">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-md-6">
                <div class="container">
                    <div class="text-center pb-3">
                        <h3 class="font-koho"><b>Order Summary:</b></h3>
                    </div>
                    <?php if (!empty($rows)) {
                        foreach ($rows as $row) { ?>
                            <div class="row">
                                <div class="col-2">
                                    <input type="number" name="quantity" id="quantityInput_<?php echo $row['order_id']; ?>" value="<?php echo $row['quantity']; ?>" class="mx-2 custom-input" readonly />
                                </div>
                                <div class="col">
                                    <p class="card-text"><?php echo $row['item_name']; ?></p>
                                </div>
                                <div class="col text-right">
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
                            <h4 class="font-kohO"><b>TOTAL</b></h4>
                        </div>
                        <div class="col text-right">
                            <p><?php echo $totalPrice; ?>.00</p>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center pb-sm-5">
                        <a href="order_cart.php">
                            <button type="button" class="custom-btn font-koho">Back to Cart</button>
                        </a>
                    </div>
                </div>
            </div>
</body>

</html>