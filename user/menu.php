<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include '../includes/header-user.php';
    ?>

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
            <h2 class="font-kohsan">Food</h2>
            <div class="row p-3">
                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-fluid" src="../images\IMG_Food-BicolExpress.PNG" alt="">
                            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                                <div>
                                    <h5 class="card-title">Food</h5>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                </div>
                            </div>
                            <button class="order-button font-koho"><b>Add to Cart</b></button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-fluid" src="../images/IMG_Food-ChickenCurry.PNG" alt="">
                            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                                <div>
                                    <h5 class="card-title">Food</h5>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                </div>
                            </div>
                            <button class="order-button font-koho"><b>Add to Cart</b></button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-fluid" src="../images/IMG_Food-Giniling.PNG" alt="">
                            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                                <div>
                                    <h5 class="card-title">Food</h5>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                </div>
                            </div>
                            <button class="order-button font-koho"><b>Add to Cart</b></button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-fluid" src="../images/IMG_Food-Gulay.PNG" alt="">
                            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                                <div>
                                    <h5 class="card-title">Food</h5>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                </div>
                            </div>
                            <button class="order-button font-koho"><b>Add to Cart</b></button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-fluid" src="../images/IMG_Food-Egg&Longganisa.PNG" alt="">
                            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                                <div>
                                    <h5 class="card-title">Food</h5>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                </div>
                            </div>
                            <button class="order-button font-koho"><b>Add to Cart</b></button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-fluid" src="../images/IMG_Food-Egg&Longganisa.PNG" alt="">
                            <div class="d-flex justify-content-between align-items-start mt-3 mb-3">
                                <div>
                                    <h5 class="card-title">Food</h5>
                                </div>
                                <div class="text-right">
                                    <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                </div>
                            </div>
                            <button class="order-button font-koho"><b>Add to Cart</b></button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Drinks Section -->
            <div class="container">
                <div id="drinks" class="menu-section">
                    <h2 class="font-koho d-flex align-items-right">Drinks</h2>

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
                                            <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                        </div>
                                    </div>
                                    <button class="order-button font-koho"><b>Add to Cart</b></button>
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
                                            <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                        </div>
                                    </div>
                                    <button class="order-button font-koho"><b>Add to Cart</b></button>
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
                                            <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                        </div>
                                    </div>
                                    <button class="order-button font-koho"><b>Add to Cart</b></button>
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
                                            <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                        </div>
                                    </div>
                                    <button class="order-button font-koho"><b>Add to Cart</b></button>
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
                                            <span class="font-weight-bold">60</span> <!-- Replace with your actual price -->
                                        </div>
                                    </div>
                                    <button class="order-button font-koho"><b>Add to Cart</b></button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="../js/menu.js"></script>
</body>

</html>