<?php
session_start();
include 'db.php';

// Check if the cart is not empty
if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    echo "Error: No items found in your cart.";
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
    <title>Second Half Jerseys</title>
    <link rel="icon" type="image/png" href="Logo/logo-2.png">
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="thank-you-container">
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been successfully placed. Here are the items you just bought:</p>

        <table class="thank-you-table">
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
                            <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" width="60">
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
        
        <p>You will receive an email confirmation shortly.</p>
        <p><a href="shop.php">Return to Inventory</a></p>
    </div>

</body>
</html>
