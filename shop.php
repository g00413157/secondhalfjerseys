<?php
include 'db.php'; // your database connection

$sql = "SELECT * FROM Merch";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Logo/logo-2.png">
    <title>Shop| Second Half Jerseys</title>
    <link rel="stylesheet" href="styles.css">
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap');
   
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<h1>Shop</h1>

<div class="product-container">
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="product-card">
            <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['team']; ?>">
            <h3><?php echo $row['team'] . ' ' . $row['season'] . ' ' . $row['year']; ?></h3>
            <p><?php echo $row['description']; ?></p>
            <p><strong>League:</strong> <?php echo $row['league']; ?></p>
            <p><strong>Size:</strong> <?php echo $row['size']; ?></p>
            <p><strong>Price:</strong> €<?php echo $row['price']; ?></p>
            <button onclick="addToCart(<?php echo $row['product_id']; ?>)">Add to Cart</button>

            
        </div>
    <?php } ?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
