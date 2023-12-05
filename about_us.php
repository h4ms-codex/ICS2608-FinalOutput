<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F2E2D4;
        }

        nav {
            background-color: #C69D9D;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 14px 16px;
        }

        nav a:hover {
            background-color: #ddd;
            color: #C69D9D;
        }

        .logo {
            width: 65px; 
            height: 50px;
        }

        .menu-about-links {
            display: flex;
            gap: 10px; /* adjust the gap between "menu" and "abouot us" */
        }

        .right-links {
            display: flex;
            gap: 10px; /* addjust the gap between "cart" and "sign in" */
        }
    </style>
</head>
<body>

    <nav>
        <div class="menu-about-links">
            <img src="images/Liempohan_Logo.png" alt="logo" class="logo">
            <a href="menu.html">Menu</a>
            <a href="about_us.html">About Us</a>
        </div>
        <div class="right-links">
            <a href="order_cart.html">Cart</a>
            <a href="login.html">Sign In</a>
        </div>
    </nav>

    <div>
        <center>
            <h2>About Us</h2>
        </center>
    </div>

</body>
</html>
