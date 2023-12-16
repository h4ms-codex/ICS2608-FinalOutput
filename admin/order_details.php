<?php
include("connection.php");

$query = "SELECT * FROM order_cart";
$stmt = $conn->query($query);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <?php include '../includes/header-admin.php'; ?>

    <div class="container mt-5">
        <div class="form-group row">
            <div class="col-12 text-center">
                <h1 class="font-koho"><b>Order Details</b></h1>
            </div>
        </div>
        <div class="form-group row">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($orders as $order) { ?>
                            <tr>
                                <td><?php echo $order['order_id']; ?></td>
                                <td><?php echo $order['item_name']; ?></td>
                                <td><?php echo $order['quantity']; ?></td>
                                <td><?php echo $order['price']; ?></td>
                                <td><?php echo $order['order_status']; ?></td>
                                <td>
                                    <a href="accept.php?acceptID=<?php echo $order['order_id']; ?>&action=accept" class="btn btn-success">Change Status</a>
                                    <a href="reject.php?deleteID=<?php echo $order['order_id']; ?>&action=reject" class="btn btn-danger">Reject</a>
                                    <a href="customer.php?customerID=<?php echo $order['order_id']; ?>&action=view" class="btn btn-danger">View Details</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>