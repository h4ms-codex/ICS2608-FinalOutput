<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KoHo&display=swap">
 
    <style>
        body {
            font-family: 'KoHo', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F2E2D4;
        }

        h1{
            font-weight: bold;

        }

        nav {
            background-color: #C69D9D;
            padding: 10px;
            overflow: hidden;
            position: relative;
            font-weight: bold;
        }

        .logo, nav a {
            float: left;
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 20px;
        }

        .logo:hover, nav a:hover {
            background-color: #ddd;
            color: #333;
        }

        .logo:active, nav a:active {
            background-color: #555;
            color: white;
        }

        .cart-btn {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            padding: 5px 8px;
            border-radius: 50%;
        }

        section {
            padding: 20px;
        }

        .order-container, .order-summary {
    border: 1px solid #ddd;
    padding: 20px;
    margin: 20px auto;
    border-radius: 10px;
    background-color: #C69D9D;
}
    </style>
</head>
<body>



    <nav class="navleft">
        <a class="logo" href="#">Your Logo</a>
        <a href="#">Home</a>
        <a href="#">Menu</a>
        <a href="#">About Us</a>
        <div class="cart-btn">
            <a href="#">Cart</a>
            <span class="cart-count">0</span>
        </div>
        <a href="#">Sign In</a>
    </nav>

    <section>
        <h1><center>Thank you for your Order</center></h1>

        <!-- Order Information Container -->
        <div class="order-container">
            <h3>Order Information</h3>
            <p><strong>Order Number:</strong> #123456</p>
            <p><strong>Order Date:</strong> December 5, 2023</p>
            <p><strong>Recipient Name:</strong> John Doe</p>
            <p><strong>Payment Method:</strong> Credit Card</p>
            <p><strong>Delivery Address:</strong> 123 Main St, Cityville</p>
        </div>

        <!-- Order Summary Container -->
        <div class="order-summary">
            <h3>Order Summary</h3>
 

        </div>
    </section>

</body>
</html>
