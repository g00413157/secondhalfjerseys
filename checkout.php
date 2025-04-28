<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db.php'; // Database connection

$session_id = session_id();

// Fetch cart items from database
$stmt = $conn->prepare("
    SELECT c.product_id, c.quantity, m.team, m.price, m.image_url, m.year
    FROM cart c
    INNER JOIN Merch m ON c.product_id = m.product_id
    WHERE c.session_id = ?
");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // If cart is empty, redirect to shop
    header("Location: shop.php");
    exit();
}

// Initialize cart details and total
$total_price = 0;
$cart_details = [];

while ($row = $result->fetch_assoc()) {
    $item_total_price = $row['price'] * $row['quantity'];
    $total_price += $item_total_price;

    $cart_details[] = [
        'name' => $row['team'] . ' ' . $row['year'],
        'price' => $row['price'],
        'quantity' => $row['quantity'],
        'total_price' => $item_total_price,
        'image_url' => $row['image_url'],
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout | Second Half Jerseys</title>
    <link rel="icon" type="image/png" href="Logo/logo-2.png">
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap');
    </style>
</head>
<body>

<?php include 'header.php'; ?>

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
                        <td><img src="<?= htmlspecialchars($item['image_url']); ?>" alt="<?= htmlspecialchars($item['name']); ?>" style="width: 60px; height: auto;"></td>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td>€<?= number_format($item['price'], 2); ?></td>
                        <td><?= (int)$item['quantity']; ?></td>
                        <td>€<?= number_format($item['total_price'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p><strong>Total Price: €<?= number_format($total_price, 2); ?></strong></p>

        <form method="POST" action="payment.php" class="checkout-form">
            <h3>Enter Your Information</h3>

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="address">Shipping Address:</label><br>
            <textarea id="address" name="address" required></textarea><br><br>

            <button type="submit" name="submit_payment">Proceed to Payment</button>
        </form>

        <a href="cart.php" class="back-to-cart-btn">← Return to Cart</a>

    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
