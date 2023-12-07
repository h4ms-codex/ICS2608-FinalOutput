<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Menu Page</title>
</head>

<body>
    <?php include '../includes/header-user.php';
    ?>
    <!-- Menu Navigation Bar -->
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg">
            <div class="d-flex align-items-center">
                <a href="../user/menu.php" class="ml-4 nav-link nav-font-koho <?php echo ($currentPage === 'menu.php') ? 'active' : ''; ?>">Food</a>
                <a href="../user/about_us.php" class="nav-link nav-font-koho <?php echo ($currentPage === 'about_us.php') ? 'active' : ''; ?>">Drinks</a>
            </div>
        </nav>
    </div>

    <!-- Food Section -->
    <div class="container pt-3">
        <div id="foodSection" class="menu-section">
            <h2 class="font-koho">Food</h2>

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

            <!-- Drinks Section -->
            <div class="container pt-3">
                <div id="foodSection" class="menu-section">
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

</body>

</html>