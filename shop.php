<?php
include 'db.php'; // your database connection

$sql = "SELECT * FROM Merch";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            width: 250px;
        }
        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .product-card h3 {
            margin: 5px 0;
        }
    </style>
</head>
<body>

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
        </div>
    <?php } ?>
</div>

</body>
</html>
