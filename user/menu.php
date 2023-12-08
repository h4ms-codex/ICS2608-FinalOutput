<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Menu Page</title>
</head>

<body>
    <?php include '../includes/header-user.php';
    ?>
    <!-- Menu Navigation Bar -->
    <nav class="navbar navbar-expand-lg sticky-top mt-4">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="#food" class="ml-4 nav-link nav-font-koho <?php echo ($currentPage === '#food') ? 'active' : ''; ?>">Food</a>
                <a href="#drinks" class="nav-link nav-font-koho <?php echo ($currentPage === '#drinks') ? 'active' : ''; ?>">Drinks</a>
            </div>
    </nav>
    </div>

    <!-- Food Section -->
    <div class="container bg-primary">
        <div id="food" class="menu-section">
            <h2 class="font-koho">Food</h2>
            <div class="row p-3">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="../images\IMG_Food-BicolExpress.PNG" alt="">
                            <h5 class="card-title">Food Item 1</h5>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Food Item 2</h5>
                            <p>Description of Food Item 2.</p>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Food Item 3</h5>
                            <p>Description of Food Item 3.</p>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Food Item 4</h5>
                            <p>Description of Food Item 4.</p>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Drinks Section -->
            <div class="container pt-3">
                <div id="drinks" class="menu-section">
                    <h2 class="font-koho">Drinks</h2>

                    <div class="row p-3">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Food Item 1</h5>
                                    <p>Description of Food Item 1.</p>
                                    <button>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Food Item 2</h5>
                                    <p>Description of Food Item 2.</p>
                                    <button>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Food Item 3</h5>
                                    <p>Description of Food Item 3.</p>
                                    <button>Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pt-sm-3 pt-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Food Item 4</h5>
                                    <p>Description of Food Item 4.</p>
                                    <button>Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="../js/menu.js"></script>
</body>

</html>