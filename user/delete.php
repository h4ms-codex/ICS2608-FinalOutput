<?php

include("connectionnn.php");

$deleteID = $_GET['deleteID'];

$sql = "DELETE FROM order_tdetails WHERE order_ID = '$deleteID';";
$stmt = $conn->prepare($sql);

$stmt->execute();

header("location: order_cart.php");

?>