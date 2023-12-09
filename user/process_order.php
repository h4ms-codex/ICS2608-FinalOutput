<?php
// Include your database connection file
include '../admin/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity = $_POST['quantity'];
    $menuitemID = $_POST['menuitem_id'];
    $extraRice = $_POST['extra_rice'];
    $longganisa = $_POST['longganisa'];
    $eggs = $_POST['eggs'];

    $totalAmount = calculateTotalAmount($quantity, $menuitemID, $extraRice, $longganisa, $eggs, $conn);

    $insertOrderQuery = "INSERT INTO order_details (quantity, total_amount, menuitem_ID, customer_ID, delivery_status) 
                        VALUES (:quantity, :total_amount, :menuitem_ID, :customer_ID, 'Pending')";

    try {
        $stmt = $conn->prepare($insertOrderQuery);

        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':total_amount', $totalAmount, PDO::PARAM_STR);
        $stmt->bindParam(':menuitem_ID', $menuitemID, PDO::PARAM_INT);
        $stmt->bindParam(':customer_ID', $customerID, PDO::PARAM_INT);

        $stmt->execute();
        header('Location: menu.php');
        exit();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function calculateTotalAmount($quantity, $menuitemID, $extraRice, $longganisa, $eggs, $conn)
{
    $menuItemQuery = "SELECT price FROM menu_details WHERE menuitem_ID = ?";
    $stmt = $conn->prepare($menuItemQuery);
    $stmt->bind_param('i', $menuitemID);
    $stmt->execute();
    $result = $stmt->get_result();
    $menuItem = $result->fetch_assoc();

    $totalAmount = ($quantity * $menuItem['price']) + ($extraRice * 2.50) + ($longganisa * 3.00) + ($eggs * 1.50);

    return $totalAmount;
}
?>


<div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
    <div class="card" data-menuitem-id="2">
        <div class="card-body">
            <img class="img-fluid" src="../images/IMG_Food-ChickenCurry.PNG" alt="">
            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                <div>
                    <h5 class="card-title font-weight-bold font-koho">Chicken Curry</h5>
                </div>
                <div class="text-right">
                    <span class="font-weight-bold font-koho">60</span>
                </div>
            </div>
            <button class="order-button font-koho" data-toggle="modal" data-target="#quantity"><b>Add to Cart</b></button>
        </div>
    </div>
</div>

<div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
    <div class="card" data-menuitem-id="3">
        <div class="card-body">
            <img class="img-fluid" src="../images/IMG_Food-Giniling.PNG" alt="">
            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                <div>
                    <h5 class="card-title font-weight-bold font-koho">Giniling</h5>
                </div>
                <div class="text-right">
                    <span class="font-weight-bold font-koho">60</span>
                </div>
            </div>
            <button class="order-button font-koho" data-toggle="modal" data-target="#quantity"><b>Add to Cart</b></button>
        </div>
    </div>
</div>

<div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
    <div class="card" data-menuitem-id="4">
        <div class="card-body">
            <img class="img-fluid" src="../images/IMG_Food-Gulay.PNG" alt="">
            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                <div>
                    <h5 class="font-weight-bold font-koho">Gulay</h5>
                </div>
                <div class="text-right">
                    <span class="font-weight-bold font-koho">60</span>
                </div>
            </div>
            <button class="order-button font-koho" data-toggle="modal" data-target="#quantity"><b>Add to Cart</b></button>
        </div>
    </div>
</div>

<div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
    <div class="card" data-menuitem-id="5">
        <div class="card-body">
            <img class="img-fluid" src="../images/IMG_Food-Egg&Longganisa.PNG" alt="">
            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                <div>
                    <h6 class="card-title">Egg & Longganisa</h6>
                </div>
                <div class="text-right">
                    <span class="font-weight-bold">60</span>
                </div>
            </div>
            <button class="order-button font-koho" data-toggle="modal" data-target="#quantity"><b>Add to Cart</b></button>
        </div>
    </div>
</div>

<!-- Drinks Section -->
<div class="container">
    <div id="drinks" class="menu-section">
        <h1 class="font-kohsan text-lg-left pl-lg-3"><b>Drinks</b></h1>
        <div class="row p-3">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="../" alt="">
                        <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                            <div>
                                <h5 class="card-title">Food</h5>
                            </div>
                            <div class="text-right">
                                <span class="font-weight-bold">60</span>
                            </div>
                        </div>
                        <button class="order-button font-koho" data-toggle="modal" data-target="#quantity"><b>Add to Cart</b></button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="../" alt="">
                        <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                            <div>
                                <h5 class="card-title">Food</h5>
                            </div>
                            <div class="text-right">
                                <span class="font-weight-bold">60</span>
                            </div>
                        </div>
                        <button class="order-button font-koho" data-toggle="modal" data-target="#quantity"><b>Add to Cart</b></button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="../" alt="">
                        <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                            <div>
                                <h5 class="card-title">Food</h5>
                            </div>
                            <div class="text-right">
                                <span class="font-weight-bold">60</span>
                            </div>
                        </div>
                        <button class="order-button font-koho" data-toggle="modal" data-target="#quantity"><b>Add to Cart</b></button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="../" alt="">
                        <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                            <div>
                                <h5 class="card-title">Food</h5>
                            </div>
                            <div class="text-right">
                                <span class="font-weight-bold">60</span>
                            </div>
                        </div>
                        <button class="order-button font-koho" data-toggle="modal" data-target="#quantity"><b>Add to Cart</b></button>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="../" alt="">
                        <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                            <div>
                                <h5 class="card-title">Food</h5>
                            </div>
                            <div class="text-right">
                                <span class="font-weight-bold">60</span>
                            </div>
                        </div>
                        <button class="order-button font-koho" data-toggle="modal" data-target="#quantity"><b>Add to Cart</b></button>
                    </div>
                </div>
            </div>

        </div>