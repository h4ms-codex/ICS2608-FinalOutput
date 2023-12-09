<?php

include("connectionnn.php");

$deleteID = $_GET['deleteID'];

$sql = "DELETE FROM order_cart WHERE item_name = '$deleteID'";
$stmt = $conn->prepare($sql);

$stmt->execute();

header("location: order_cart.php");

?>
