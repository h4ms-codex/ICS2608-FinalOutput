<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KoHo&display=swap">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <nav class="navbar main-navbar navbar-expand-lg">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="../user/index.php">
                    <img class="logo" src="../images/Liempohan_Logo.png" alt="">
                </a>
                <a href="../user/menu.php" class="ml-4 nav-link nav-font-koho <?php echo ($currentPage === 'menu.php') ? 'active' : ''; ?>">Menu</a>
                <a href="../user/about_us.php" class="nav-link nav-font-koho <?php echo ($currentPage === 'about_us.php') ? 'active' : ''; ?>">About us</a>
            </div>
            <a href="../user/order_cart.php" class="nav-link nav-font-koho <?php echo ($currentPage === 'order_cart.php') ? 'active' : ''; ?>">Cart
                <span class="custom-badge badge rounded-circle">
                    <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                </span>
            </a>
        </div>
    </nav>
</body>

</html>

</body>

</html>