<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=KoHo&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/checkout.css">

</head>

<body class="font-koho">
    <?php include '../includes/header-user.php';
    ?>
   
        <div class="column">
            <div class="col-md-6">
   
                    <div class = "delivery-container">
                    <h2>Delivery Information:</h2>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label class="header" for="deliveryTo">Delivery to:</label>
                            <input type="text" class="custom-text-box" id="deliveryTo" name="deliveryTo" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address details:</label>
                            <textarea class="custom-text-box" id="address" name="address" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="deliveryNote">Note to delivery man:</label>
                            <textarea class="custom-text-box" id="deliveryNote" name="deliveryNote"></textarea>
                        </div>
                </div>
                    </form>
                </div>
</div>                                                                                                                   

          
                    <div class="column">
                        <div class="col-md-6">
         
                            <div class="detail-container">
                    <h2>Add your details:</h2>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" class="custom-text-box" id="firstName" name="firstName" required>
                        </div>

                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" class="custom-text-box" id="lastName" name="lastName" required>
                        </div>

                        <div class="form-group">
                            <label for="mobileNumber">Mobile Number:</label>
                            <input type="tel" class="custom-text-box" id="mobileNumber" name="mobileNumber" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="custom-text-box" id="email" name="email" required>
                        </div>
                </div>
                </form>                                                                                                
 
                    <div class="row">
                        <div class="col-md-6">
             
                            <div class="ordersummary-container">
                        <h2>Order Summary</h2>

                        <p>Total Items: 5</p>
                        <p>Total Price: PHP 50.00</p>
                        <button class="btn btn-primary back-to-cart">Back to Cart</button>
                    </div>
                 </div>                
                </div>
            </div>
        </div>                                                                                                

                    <div class="row">
                        <div class="col-md-6">
                     
                                <div class="payment-container">
                    <h2>Payment Method:</h2>
                    <form action="#" method="post">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery" value="cashOnDelivery" checked>
                            <label class="form-check-label" for="cashOnDelivery">
                                Cash on Delivery
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="gcash" value="gcash">
                            <label class="form-check-label" for="gcash">
                                GCash
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="creditCard">
                            <label class="form-check-label" for="creditCard">
                                Credit Card
                            </label>
                        </div>
                    </form>
                    <button class="place-order-btn">Place Order</button>
                </div>                                                                      
            </div>
            </div>
            </div>
            </div>                                                                                                   

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>