<?php
session_start();
// Clear the cart after successful checkout
unset($_SESSION['cart_items']);
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation | Second Half Jerseys</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="Logo/logo-2.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        body {
            font-family: 'Bebas Neue', cursive;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .confirmation-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 80px auto;
            max-width: 600px;
            text-align: center;
        }
        .confirmation-container h1 {
            color: #2E8B57;
            margin-bottom: 20px;
        }
        .confirmation-container a {
            color: #0066cc;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
        }
        .confirmation-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="confirmation-container">
    <h1>Thank You for Your Order! 🎉</h1>
    <p>Your order has been successfully placed.<br> You will receive a confirmation email shortly.</p>
    <p><a href="shop.php">← Return to Shop</a></p>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
