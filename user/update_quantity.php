

<?php
include("connectionnn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST["item_name"];
    $newQuantity = $_POST["new_quantity"];

    // Update the quantity in the database
    $sql = "UPDATE order_cart SET quantity = :quantity WHERE item_name = :item_name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':quantity', $newQuantity, PDO::PARAM_INT);
    $stmt->bindParam(':item_name', $item_name, PDO::PARAM_STR);
    $stmt->execute();
}
?>