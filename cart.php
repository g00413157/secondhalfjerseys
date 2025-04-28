<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db.php'; // database connection

$session_id = session_id();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

// Handle quantity updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart']) && isset($_POST['quantities'])) {
        foreach ($_POST['quantities'] as $product_id => $quantity) {
            $quantity = (int)$quantity;
            $product_id = (int)$product_id;

            if ($quantity <= 0) {
                // Remove item if quantity is 0
                $delete_stmt = $conn->prepare("DELETE FROM cart WHERE session_id = ? AND product_id = ?");
                $delete_stmt->bind_param("si", $session_id, $product_id);
                $delete_stmt->execute();
            } else {
                // Update quantity
                $update_stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE session_id = ? AND product_id = ?");
                $update_stmt->bind_param("isi", $quantity, $session_id, $product_id);
                $update_stmt->execute();
            }
        }
        header("Location: cart.php");
        exit;
    }
}

// Fetch cart items
$stmt = $conn->prepare("
    SELECT c.product_id, c.quantity, m.team, m.price, m.image_url, m.year
    FROM cart c
    INNER JOIN Merch m ON c.product_id = m.product_id
    WHERE c.session_id = ?
");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart | Second Half Jerseys</title>
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
    <br>
    <h1>Your Cart</h1>

    <?php if (isset($_GET['checkout']) && $_GET['checkout'] == 'success'): ?>
        <p style="color: green;"><strong>Checkout successful! Thank you for your purchase.</strong></p>
    <?php endif; ?>

    <?php if ($result->num_rows > 0): ?>
    <form method="POST" action="cart.php">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                while ($row = $result->fetch_assoc()):
                    $subtotal = $row['price'] * $row['quantity'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><?= htmlspecialchars($row['team'] . ' ' . $row['year']) ?></td>
                        <td><img class="cartimg" src="<?= htmlspecialchars($row['image_url']) ?>" alt="<?= htmlspecialchars($row['team']) ?>"></td>
                        <td>€<?= number_format($row['price'], 2) ?></td>
                        <td>
                            <input type="number" name="quantities[<?= htmlspecialchars($row['product_id']) ?>]" value="<?= (int)$row['quantity'] ?>" min="0">
                        </td>
                        <td>€<?= number_format($subtotal, 2) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="total-price">
            <h3>Total: €<?= number_format($total, 2) ?></h3>
        </div>

        <div class="cart-actions">
            <button type="submit" name="update_cart" class="update-btn">Update Cart</button>
            <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
        </div>
    </form>
    <?php else: ?>
        <p>Your cart is currently empty. <a href="shop.php">Go shopping!</a></p>
    <?php endif; ?>

    <div class="continue-shopping-wrapper">
        <a href="shop.php" class="continue-shopping-btn">← Continue Shopping</a>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
