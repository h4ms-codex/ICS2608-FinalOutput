<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KoHo&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
    <style>
    body {
        font-family: 'KoHo', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #F2E2D4;
    }

    h1 {
        font-weight: bold;
    }

    nav {
        padding: 10px;
        overflow: hidden;
        position: relative;
        font-weight: bold;
        font-size: 22px; 
    }

    .navbar-light {
        background-color: #C69D9D !important;
    }



    .logo,
    nav a {
        display: block;
        color: #ffffff;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s;
        border-radius: 20px;
    }

    .logo img {
        max-height: 50px; 
        margin-top: -5px; 
    }

    .logo:hover,
    nav a:hover {
        background-color: #8c6d6d;

    }

    .logo:active,
    nav a:active {
        background-color: #555;
        color: white;
    }



    .cart-count {
        position: absolute;
        top: 50%;
        right: 50%;
        transform: translate(50%, -50%);
        background-color: red;
        color: white;
        padding: 8px 4px;
        border-radius: 50%;
        font-size: 14px; 
        z-index: -1; 
    }

    .cart-btn a,
    .navbar-nav .nav-link {
        color: #634E4E;
        transition: color 0.3s;
    }
    

    section {
        padding: 20px;
    }

    .order-container,
    .order-summary {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 20px auto;
        border-radius: 10px;
        background-color: #C69D9D;
    }
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand logo" href="index.php">
        <img src="liempohan_logo.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about_us.php">About Us</a>
            </li>
        </ul>
        <div class="cart-btn ml-auto">
            <a class="nav-link" href="order_cart.php">Cart</a>
            <span class="cart-count">0</span>
        </div>
        <a class="nav-link" href="login.php">Sign In</a>
    </div>
</nav>

<section>
    <h1 class="text-center">Thank you for your Order</h1>

    <div class="order-container">
        <h3>Order Information</h3>
        <p><strong>Order Number:</strong> #123456</p>
        <p><strong>Order Date:</strong> December 5, 2023</p>
        <p><strong>Recipient Name:</strong> Randolph Alvarado</p>
        <p><strong>Payment Method:</strong> Credit Card</p>
        <p><strong>Delivery Address:</strong> 164 Meycauayan, Bulacan</p>
    </div>

    <div class="order-summary">
        <h3>Order Summary</h3>
        
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>