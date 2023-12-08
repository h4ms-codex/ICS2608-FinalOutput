<?php

include("connection.php");

$deleteID = $_GET['deleteID'];

$sql = "DELETE FROM order-tdetails WHERE order_ID = $deleteID";
$stmt = $conn->prepare($sql);

$stmt->execute();

header("location: order_cart.php");

?>