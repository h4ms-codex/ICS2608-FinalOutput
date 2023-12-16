<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["acceptID"]) && isset($_GET["action"])) {
    $orderId = $_GET["acceptID"];
    $action = $_GET["action"];

    if ($action == "accept") {
        try {
            $sql = "UPDATE order_cart SET order_status = 'on-delivery' WHERE order_id = :order_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}

ob_end_clean();

header("Location: order_details.php");
exit();
