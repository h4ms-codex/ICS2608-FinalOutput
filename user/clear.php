<?php

include("../admin/connection.php");

$clearID = $_GET['clearID'];

$sql = "TRUNCATE TABLE order_cart;";
$stmt = $conn->prepare($sql);

$stmt->execute();

header("location: order_cart.php");

?>