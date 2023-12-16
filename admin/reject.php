<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $deleteID = $_GET['deleteID'];

    $sql = "DELETE FROM order_cart WHERE order_id = :deleteID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':deleteID', $deleteID, PDO::PARAM_INT);
    $stmt->execute();

    header("location: order_details.php");
}