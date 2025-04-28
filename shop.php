<?php
session_start();
include 'db.php'; // connect to database

$session_id = session_id();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL; // if user logged in
$added_at = date('Y-m-d H:i:s');

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = (int)$_POST['add_to_cart'];

    // Check if already in cart
    $check_stmt = $conn->prepare("SELECT quantity FROM cart WHERE session_id = ? AND product_id = ?");
    $check_stmt->bind_param("si", $session_id, $product_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Item is already in the cart, just update the quantity
        $update_stmt = $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE session_id = ? AND product_id = ?");
        $update_stmt->bind_param("si", $session_id, $product_id);
        $update_stmt->execute();
    } else {
        // Insert new item into cart
        $insert_stmt = $conn->prepare("INSERT INTO cart (user_id, added_at, quantity, session_id, product_id) VALUES (?, ?, 1, ?, ?)");
        $insert_stmt->bind_param("issi", $user_id, $added_at, $session_id, $product_id);
        $insert_stmt->execute();  // Execute only once after insertion

        if ($insert_stmt->error) {
            echo "Insert error: " . $insert_stmt->error;
        }
    }

    header("Location: shop.php?added=true");
    exit;
}

// --- FILTERS ---
$merch_name = $_GET['merch_name'] ?? '';
$league = $_GET['league'] ?? '';

// Dropdown data
$league_result = $conn->query("SELECT DISTINCT league FROM Merch WHERE league IS NOT NULL AND league != ''");
$team_result = $conn->query("SELECT DISTINCT team FROM Merch WHERE team IS NOT NULL AND team != ''");

// Product fetch
$query = "SELECT * FROM Merch WHERE 1";
$params = [];
$types = '';

if (!empty($merch_name)) {
    $query .= " AND team = ?";
    $params[] = $merch_name;
    $types .= 's';
}
if (!empty($league)) {
    $query .= " AND league = ?";
    $params[] = $league;
    $types .= 's';
}

$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="Logo/logo-2.png">
    <title>Shop | Second Half Jerseys</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap');
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<?php if (isset($_GET['added'])): ?>
    <p style="color: green;">Item added to cart!</p>
<?php endif; ?>

<!-- Filters -->
<form method="GET" action="shop.php">
    <label for="merch_name"><b>Team:</b></label>
    <select name="merch_name" id="merch_name">
        <option value="">Select Team</option>
        <?php while($team = $team_result->fetch_assoc()): ?>
            <option value="<?= htmlspecialchars($team['team']) ?>" <?= ($merch_name == $team['team']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($team['team']) ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="league"><b>League:</b></label>
    <select name="league" id="league">
        <option value="">Select League</option>
        <?php while($lg = $league_result->fetch_assoc()): ?>
            <option value="<?= htmlspecialchars($lg['league']) ?>" <?= ($league == $lg['league']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($lg['league']) ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button type="submit">Apply Filters</button>
</form>

<!-- Product Grid -->
<div class="inventory-container">
<?php while($row = $result->fetch_assoc()): ?>
    <div class="merch-card">
        <img src="<?= htmlspecialchars($row['image_url']) ?>" alt="<?= htmlspecialchars($row['team']) ?>" class="merch-image">
        <div class="merch-info">
            <h3><?= htmlspecialchars($row['team'] . ' ' . $row['year']) ?></h3>
            <p><?= htmlspecialchars($row['description']) ?></p>
            <p class="price">€<?= number_format($row['price'], 2) ?></p>

            <form method="POST" action="shop.php?<?= htmlspecialchars(http_build_query($_GET)) ?>">
                <input type="hidden" name="add_to_cart" value="<?= $row['product_id'] ?>">
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
            </form>
        </div>
    </div>
<?php endwhile; ?>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
