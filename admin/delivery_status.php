<?php
include('connection.php');

if (isset($_POST['update_status'])) {
    $orderID = $_POST['order_id'];

    $updateQuery = "UPDATE order_details SET delivery_status = 'Delivered' WHERE order_ID = :order_id";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bindParam(':order_id', $orderID, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: order_details.php");
        exit();
    } else {
        echo "Failed to update delivery status.";
    }
}
?>
