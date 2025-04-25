<?php
session_start();
include 'db.php'; 
$cart_count = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item) {
        $cart_count += $item['quantity'];
    }
}
// Check if the cart is not empty
if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    header("Location: awfcInventory.php"); 
    exit();
}

// Fetch cart items from the session
$cart_items = $_SESSION['cart_items'];

// Initialize total price
$total_price = 0;
$cart_details = [];

// Fetch details for each cart item
foreach ($cart_items as $item_id => $item_info) {
    $quantity = (int) $item_info['quantity']; 

    // Query to fetch item details from the database
    $stmt = $conn->prepare("SELECT * FROM merchandise WHERE item_id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    if ($item) {
        $item_price = (float) $item['price'];
        $item_total_price = $item_price * $quantity; 
        $total_price += $item_total_price;

        // Store item details
        $cart_details[] = [
            'name' => $item['merch_name'],
            'price' => $item_price,
            'quantity' => $quantity,
            'total_price' => $item_total_price,
            'image_url' => $item['image_url'] 
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Second Half Jerseys</title>
    <link rel="icon" type="image/png" href="Logo/logo-2.png">
    <link rel="stylesheet" href="styless.css"> 
</head>

<body>
    <?php include 'header.php'; ?> 

    <div class="cart-container">
        <br>
        <h1>Confirm Your Order</h1>
        <div class="checkout-wrapper">
            <div class="cart-items">
                <table class="checkout-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_details as $item): ?>
                            <tr>
                                <td>
                                    <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="Item Image" width="50">
                                </td>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td>€<?php echo number_format($item['price'], 2); ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td>€<?php echo number_format($item['total_price'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="total-price">Total Price: €<?php echo number_format($total_price, 2); ?></p>
            </div>
        </div>

        <!-- Payment form for user -->
        <form method="POST" action="finalize_payment.php" class="payment-form">
            <h3>Enter Your Payment Information</h3>

            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" required>

            <label for="expiry_date">Expiry Date:</label>
            <input type="text" id="expiry_date" name="expiry_date" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>

            <button type="submit" name="submit_payment">Submit Payment</button>
        </form>
    </div>

</body>

</html>
