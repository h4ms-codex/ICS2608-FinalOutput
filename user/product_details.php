<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page with Popups</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/popup.css"> <!-- Add a separate CSS file for the popup styles -->
</head>

<body>
    <?php include '../includes/header-user.php'; ?>

    <nav class="navbar navbar-menu navbar-expand-lg sticky-top">
        <!-- Your existing navigation code here -->
    </nav>

    <!-- Food Section -->
    <div class="container bg-menu">
        <div id="food" class="menu-section">
            <!-- Your existing food items code here with modifications for popups -->
        </div>
    </div>

    <!-- Drinks Section -->
    <div class="container">
        <div id="drinks" class="menu-section">
            <!-- Your existing drinks items code here with modifications for popups -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/popup.js"></script> <!-- Add a separate JS file for the popup functionality -->
</body>

</html>
