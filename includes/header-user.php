<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/GitHub/ICS2608-FinalOutput/css/order_cart.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KoHo&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kreon&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KohSantepheap&display=swap">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <nav class="navbar main-navbar navbar-expand-lg">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="../user/menu.php">
                    <img class="logo" src="../images/Liempohan_Logo.png" alt="">
                </a>
                <a href="../user/menu.php" class="ml-4 nav-link nav-font-koho <?php echo ($currentPage === 'menu.php') ? 'active' : ''; ?>">Menu</a>
                <a href="../user/about_us.php" class="nav-link nav-font-koho <?php echo ($currentPage === 'about_us.php') ? 'active' : ''; ?>">About us</a>
            </div>
            <a href="../user/order_cart.php" class="nav-link nav-font-koho <?php echo ($currentPage === 'order_cart.php') ? 'active' : ''; ?>">Cart
            </a>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

</body>

</html>