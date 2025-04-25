<?php
session_start();
include 'db.php';
$cart_count = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item) {
        $cart_count += $item['quantity'];
    }
}
// Check if cart_items session exists and is not empty
if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    header("Location: shop.php"); // Redirect to the inventory page if the cart is empty
    exit();
}

// Fetch cart items from the session
$cart_items = $_SESSION['cart_items'];

// Initialize total price
$total_price = 0;

// Fetch details for each cart item
$cart_details = [];
foreach ($cart_items as $item_id => $item_info) {
    $quantity = $item_info['quantity'];

    // Query to fetch item details from the database
    $stmt = $conn->prepare("SELECT * FROM merchandise WHERE item_id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    if ($item) {
        $item_price = $item['price'];
        $item_total_price = $item_price * $quantity;
        $total_price += $item_total_price;

        $cart_details[] = [
            'name' => $item['merch_name'],
            'price' => $item['price'],
            'quantity' => $quantity,
            'total_price' => $item_total_price,
            'image_url' => $item['image_url'],
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Second Half Jerseys</title>
    <link rel="icon" type="image/png" href="Logo/logo-2.png">
    <link rel="stylesheet" href="styless.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <br>
    <h1>Checkout</h1>

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
                                <img src="<?php echo htmlspecialchars($item['image_url']); ?>"
                                    alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 60px; height: auto;">
                            </td>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td>€<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>€<?php echo number_format($item['total_price'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p><strong>Total Price: €<?php echo number_format($total_price, 2); ?></strong></p>
       =
        <form method="POST" action="payment.php" class="checkout-form">
            <h3>Enter Your Information</h3>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="address">Shipping Address:</label>
            <textarea id="address" name="address" required></textarea><br>

            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="cash_on_delivery">Cash on Delivery</option>
            </select><br><br>

            <button type="submit" name="submit_payment">Proceed to Payment</button>
        </form>
        </div>
    </div>
</body>

</html>