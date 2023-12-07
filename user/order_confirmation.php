    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Order Confirmation</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KoHo&display=swap">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/order_confirmation.css">


    </head>
    
    <body class="font-koho">
        <?php include '../includes/header-user.php';
        ?>
        <section>

        <div class="order-container">
            <h3>Order Information</h3>
            <p><strong>Order Number:</strong> <?php echo $orderID; ?></p>
            <p><strong>Order Date:</strong> <?php echo date("F j, Y"); ?></p>
            <p><strong>Recipient Name:</strong> <?php echo $recipientname; ?></p>
            <p><strong>Payment Method:</strong> <?php echo $paymentmethod; ?></p>
            <p><strong>Delivery Address:</strong> <?php echo $address; ?></p>
        </div>

        <div class="order-summary">
            <h3>Order Summary</h3>
            <p><strong>Cart:</strong> <?php echo $orderitem; ?></p>
            <p><strong>Quantity:</strong> <?php echo $quantity; ?></p>
        </div>
    </section>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>