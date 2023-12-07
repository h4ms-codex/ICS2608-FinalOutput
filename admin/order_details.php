<?php include("connection.php");

$query = "SELECT order_details.*, 
            menu_details.item_name, 
            CONCAT(customer_details.firstname, ' ', customer_details.lastname) AS customer_name,
            customer_details.address
              FROM order_details
              JOIN menu_details ON order_details.menuitem_ID = menu_details.menuitem_ID
              JOIN customer_details ON order_details.customer_ID = customer_details.customer_ID";
$stmt = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
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
        <div class="form-group row d-flex justify-content-center">
            <div class="col-6">
                <a href="transaction_rep.php">
                    <button class="form-control custom-btn btn">Go to Transaction Report</button>
                </a>
            </div>
        </div>
        <div class="form-group row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Menu Item</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM order_details ORDER BY order_id DESC";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $product_ID = $row['order_ID'];
                            $product_name = $row['order_date'];
                            $product_description = $row['quantity'];
                            $category = $row['total_amount'];
                            $brand = $row['payment_method'];
                            $price = $row['item_name'];
                            $cost = $row['customer_name'];
                            $quantity_stock = $row['address'];

                            echo '<tr>
                    <td>' . $order_ID . '</td>
                    <td>' . $order_date . '</td>
                    <td>' . $quantity . '</td>
                    <td>' . $total_amount . '</td>
                    <td>' . $payment_method . '</td>
                    <td>' . $item_name . '</td>
                    <td>' . $customer_name . '</td>
                    <td>' . $address . '</td>
                    <td>
                        <form method="post" action="update_delivery_status.php">
                        <input type="hidden" name="order_id" value="' . $order_ID . '">
                        <button class="btn-primary"><a class="text-light" href="transaction_rep.php?deleteID=' . $order_ID . '">View Details</a></button>
                </td>
                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>