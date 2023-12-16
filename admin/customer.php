<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["customerID"]) && isset($_GET["action"]) && $_GET["action"] == "view") {
    $customerId = $_GET["customerID"];

    // Fetch customer details
    $query = "SELECT * FROM customer_details WHERE customer_ID = :customer_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
    $stmt->execute();
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Handle invalid or missing parameters
    echo "Invalid request";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <?php include '../includes/header-admin.php'; ?>

    <div class="container mt-5">
        <div class="form-group row">
            <div class="col-12 text-center">
                <h1 class="font-koho"><b>Customer Details</b></h1>
            </div>
        </div>
        <div class="form-group row">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php if ($customer) { ?>
                            <tr>
                                <td><?php echo $customer['order_ID']; ?></td>
                                <td><?php echo $customer['firstname']; ?></td>
                                <td><?php echo $customer['lastname']; ?></td>
                                <td><?php echo $customer['phone_number']; ?></td>
                                <td><?php echo $customer['email']; ?></td>
                                <td><?php echo $customer['address']; ?></td>
                                <td><?php echo $customer['payment_method']; ?></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7">Customer not found</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>