<?php
session_start();
include("../admin/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["addCartBtn"])) {
    $item_name = $_POST["item_name"];
    $price = $_POST["price"];
    $quantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : 1;

    try {
        $price = $quantity * $price;

        $sql = "INSERT INTO order_cart (item_name, price, quantity)
                VALUES (:item_name, :price, :quantity)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':item_name', $item_name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);

        $stmt->execute();

        // Update cart count in session
        if (isset($_SESSION['cart_count'])) {
            $_SESSION['cart_count'] += $quantity;
        } else {
            $_SESSION['cart_count'] = $quantity;
        }

        header("Location: menu.php");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/product_details.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php include '../includes/header-user.php'; ?>

    <nav class="navbar navbar-menu navbar-expand-lg sticky-top">
        <div class="container">
            <div id="menu-buttons-container" class="menu-buttons-container">
                <a id="food-button" href="#food" class="nav-link nav-font-koho menu-btn <?php echo ($currentPage === '#food') ? 'active' : ''; ?>">Food</a>
                <a id="drinks-button" href="#drinks" class="nav-link nav-font-koho menu-btn <?php echo ($currentPage === '#drinks') ? 'active' : ''; ?>">Drinks</a>
            </div>
        </div>
    </nav>

    <!-- Food Section -->
    <div class="container bg-menu">
        <div id="food" class="menu-section">
            <h1 class="font-kohsan text-lg-left pl-lg-3"><b>Food</b></h1>
            <div class="row p-3">
                <!-- Bicol Express Card -->
                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card" data-menuitem-id="1">
                        <div class="card-body">
                            <img class="img-fluid" src="../images/IMG_Food-BicolExpress.PNG" alt="">
                            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                                <div>
                                    <h5 class="card-title font-weight-bold font-koho">Bicol Express</h5>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold font-koho">60</span>
                                </div>
                            </div>
                            <button type="button" class="order-button font-koho" data-toggle="modal" data-target="#quantityBicolExpress"><b>Add to Cart</b></button>
                        </div>
                    </div>
                </div>

                <!-- Chicken Curry Card -->
                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card" data-menuitem-id="2">
                        <div class="card-body">
                            <img class="img-fluid" src="../images/IMG_Food-ChickenCurry.PNG" alt="">
                            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                                <div>
                                    <h5 class="card-title font-weight-bold font-koho">Chicken Curry</h5>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold font-koho">80</span>
                                </div>
                            </div>
                            <button type="button" class="order-button font-koho" data-toggle="modal" data-target="#quantityChickenCurry"><b>Add to Cart</b></button>
                        </div>
                    </div>
                </div>

                <!-- Giniling Card -->
                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card" data-menuitem-id="2">
                        <div class="card-body">
                            <img class="img-fluid" src="../images/IMG_Food-Giniling.PNG" alt="">
                            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                                <div>
                                    <h5 class="card-title font-weight-bold font-koho">Chicken Curry</h5>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold font-koho">80</span>
                                </div>
                            </div>
                            <button type="button" class="order-button font-koho" data-toggle="modal" data-target="#quantityGiniling"><b>Add to Cart</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="drinks" class="menu-section">
            <h1 class="font-kohsan text-lg-left pl-lg-3"><b>Drinks</b></h1>
        </div>

    </div>

    <!-- Quantity Modal for Bicol Express -->
    <div class="modal fade" id="quantityBicolExpress" tabindex="-1" role="dialog" aria-labelledby="quantityModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" action="menu.php" class="modal-form">
                        <input type="hidden" name="item_name" value="Bicol Express" />
                        <input type="hidden" name="price" value="60.00" />
                        <h3 class="font-kohsan text-center"><b>Quantity for Bicol Express:</b></h3>
                        <div class="d-flex justify-content-center align-items-center">
                            <button id="decreaseQuantityBtnBicolExpress" class="btn" type="button" onclick="updateQuantity('quantityInputBicolExpress', 1)">
                                <svg width="30" height="30" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20.4912" r="18.5" fill="transparent" stroke="black" stroke-width="3" />
                                    <line x1="19.3334" y1="9.82471" x2="19.3334" y2="29.8247" stroke="black" stroke-width="4" />
                                    <line x1="9.33337" y1="20.3247" x2="30.6667" y2="20.3247" stroke="black" stroke-width="3" />
                                </svg>
                            </button>
                            <input type="number" name="quantity" id="quantityInputBicolExpress" value="1" min="1" class="mx-2" style="background: transparent; border: none; text-align: center;" readonly />
                            <button id="increaseQuantityBtnBicolExpress" class="btn" type="button" onclick="updateQuantity('quantityInputBicolExpress', -1)">
                                <svg width="30" height="30" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20.4912" r="18.5" fill="transparent" stroke="black" stroke-width="3" />
                                    <line x1="9.33337" y1="20.3247" x2="30.6667" y2="20.3247" stroke="black" stroke-width="3" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="custom-add-btn btn" name="addCartBtn">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Quantity Modal for Chicken Curry -->
    <div class="modal fade" id="quantityChickenCurry" tabindex="-1" role="dialog" aria-labelledby="quantityModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" action="menu.php" class="modal-form">
                        <input type="hidden" name="item_name" value="Chicken Curry" />
                        <input type="hidden" name="price" value="60.00" />
                        <h3 class="font-kohsan text-center"><b>Quantity for Chicken Curry:</b></h3>
                        <div class="d-flex justify-content-center align-items-center">
                            <button id="decreaseQuantityBtnChickenCurry" class="btn" type="button" onclick="updateQuantity('quantityInputChickenCurry', 1)">
                                <svg width="30" height="30" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20.4912" r="18.5" fill="transparent" stroke="black" stroke-width="3" />
                                    <line x1="19.3334" y1="9.82471" x2="19.3334" y2="29.8247" stroke="black" stroke-width="4" />
                                    <line x1="9.33337" y1="20.3247" x2="30.6667" y2="20.3247" stroke="black" stroke-width="3" />
                                </svg>
                            </button>
                            <input type="number" name="quantity" id="quantityInputChickenCurry" value="1" min="1" class="mx-2" style="background: transparent; border: none; text-align: center;" readonly />
                            <button id="increaseQuantityBtnChickenCurry" class="btn" type="button" onclick="updateQuantity('quantityInputChickenCurry', -1)">
                                <svg width="30" height="30" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20.4912" r="18.5" fill="transparent" stroke="black" stroke-width="3" />
                                    <line x1="9.33337" y1="20.3247" x2="30.6667" y2="20.3247" stroke="black" stroke-width="3" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="custom-add-btn btn" id="addCartBtnChickenCurry">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Quantity Modal for Giniling-->
    <div class="modal fade" id="quantityGiniling" tabindex="-1" role="dialog" aria-labelledby="quantityModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" action="menu.php" class="modal-form">
                        <input type="hidden" name="item_name" value="Bicol Express" />
                        <input type="hidden" name="price" value="60.00" />
                        <h3 class="font-kohsan text-center"><b>Quantity for Bicol Express:</b></h3>
                        <div class="d-flex justify-content-center align-items-center">
                            <button id="decreaseQuantityBtnGiniling" class="btn" type="button" onclick="updateQuantity('quantityInputGiniling', 1)">
                                <svg width="30" height="30" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20.4912" r="18.5" fill="transparent" stroke="black" stroke-width="3" />
                                    <line x1="19.3334" y1="9.82471" x2="19.3334" y2="29.8247" stroke="black" stroke-width="4" />
                                    <line x1="9.33337" y1="20.3247" x2="30.6667" y2="20.3247" stroke="black" stroke-width="3" />
                                </svg>
                            </button>
                            <input type="number" name="quantity" id="quantityInputGiniling" value="1" min="1" class="mx-2" style="background: transparent; border: none; text-align: center;" readonly />
                            <button id="increaseQuantityBtnGiniling" class="btn" type="button" onclick="updateQuantity('quantityInputGiniling', -1)">
                                <svg width="30" height="30" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20.4912" r="18.5" fill="transparent" stroke="black" stroke-width="3" />
                                    <line x1="9.33337" y1="20.3247" x2="30.6667" y2="20.3247" stroke="black" stroke-width="3" />
                                </svg>
                            </button>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/product_details.js"></script>
</body>

</html>