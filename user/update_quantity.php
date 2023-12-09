<?php
include("connectionnn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = $_POST["order_id"];
    $newQuantity = $_POST["new_quantity"];

    // Update the quantity in the database
    $sql = "UPDATE order_tdetails SET quantity = :quantity WHERE order_ID = :order_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':quantity', $newQuantity, PDO::PARAM_INT);
    $stmt->bindParam(':order_id', $orderID, PDO::PARAM_STR);
    $stmt->execute();
}
?>