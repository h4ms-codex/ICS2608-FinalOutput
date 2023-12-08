<?php

include("connection.php");

$clearID = $_GET['clearID'];

$sql = "DELETE * FROM order-tdetails WHERE order_ID = $clearID";
$stmt = $conn->prepare($sql);

$stmt->execute();

header("location: order_cart.php");

?>