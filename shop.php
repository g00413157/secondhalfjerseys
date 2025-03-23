<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Logo/logo-2.png">
    <title>Second Half Jerseys | Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap');
    </style>
    <?php include('header.php'); ?>
  
    <div class="product-grid">
        <section class="shop">
            <br>
            <h1 class="titles">Shop Our Jerseys</h1>
            <br>
            <div class="product-grid">
                <?php
                // Product array with front and back images
                $jerseys = [
                    [
                        'name' => 'Arsenal Home 2023/24',
                        'price' => 50,
                        'image' => 'Jerseys/Arsenal-24-Home-Front.jpeg',
                        'back_image' => 'Jerseys/Arsenal-24-Home-Back.jpeg',
                        'description' => 'Official Arsenal home jersey for the 2023/24 season. Classic red and white design.',
                         'size' => 'XXL'
                    ], 
                    [
                        'name' => 'Arsenal Women Away 2023/24',
                        'price' => 50,
                        'image' => 'Jerseys/Arsenal-Women-23-Away-Front.jpeg',
                        'back_image' => 'Jerseys/Arsenal-Women-23-Away-Back.jpeg',
                        'description' => 'Arsenal Women Away Kit 2023/24, This Jersey includes "RUSSO 23" on the back in WSL font',
                        'size' => 'M'
                    ],   
                    [
                        'name' => 'Arsenal Third 2022/23',
                        'price' => 40,
                        'image' => 'Jerseys/Arsenal-22-Third-Front.jpeg',
                        'back_image' => 'Jerseys/Arsenal-22-Third-Back.jpeg',
                        'description' => 'Arsenal Third kit for the 2022/23 season. Pink with Dark Blue accents.',
                         'size' => 'S'
                    ],
                    [
                        'name' => 'Arsenal Third 2024/25 (Printed)',
                        'price' => 60,
                        'image' => 'Jerseys/Arsenal-Women-24-Third-Front.jpeg',
                        'back_image' => 'Jerseys/Arsenal-Women-24-Third-Back.jpeg',
                        'description' => 'Arsenals Third jersey for the 2024/25 season featuring "WILLIAMSON 6" on the back in WSL font and the Barclays Womens Super League patch on the right arm.',
                         'size' => 'XXL'
                    ],     
                    [
                        'name' => 'Barcelona Third 2023/24',
                        'price' => 50,
                        'image' => 'Jerseys/Barcelona-24-Third-Front.jpeg',
                        'back_image' => 'Jerseys/Barcelona-24-Third-Back.jpeg',
                        'description' => 'Barcelona third kit for the 2023/24 season. Unique turquoise design.',
                        'size' => 'M'
                    ],
                    [
                        'name' => 'Crystal Palace Home 2022/23',
                        'price' => 40,
                        'image' => 'Jerseys/Palace-2223-front.jpeg',
                        'back_image' => 'Jerseys/Palace-2223-back.jpeg',
                        'description' => 'Crystal Palace home shirt for the 2022/23 season. Red and blue stripes.',
                        'size' => 'XXL'
                    ],
                    [
                        'name' => 'Manchester United Away 2015/16',
                        'price' => 25,
                        'image' => 'Jerseys/ManchesterUnited-15-Front.jpeg',
                        'back_image' => 'Jerseys/ManchesterUnited-15-Back.jpeg',
                        'description' => 'Manchester United Away shirt from the 2015/16 season. White with red details.',
                        'size' => 'XL'
                    ],

                    [
                        'name' => 'Spain Women 2023/24 (Printed)',
                        'price' => 60,
                        'image' => 'Jerseys/Spain-23-front.jpeg',
                        'back_image' => 'Jerseys/Spain-23-back.jpeg',
                        'description' => 'Spain National Team Home Kit for 2023/24. Red with Yellow details, Printed with "Alexia 11" ',
                        'size' => 'XXL'
                    ],
                    [
                        'name' => 'Republic Of Ireland Away 2022/23',
                        'price' => 30,
                        'image' => 'Jerseys/IRE-22-Away-Front.jpeg',
                        'back_image' => 'Jerseys/IRE-22-Away-Back.jpeg',
                        'description' => 'Republic of Ireland Away kit for 2022/23. White with green accents.',
                         'size' => 'L '
                    ],
                    [
                        'name' => 'Republic Of Ireland Home 2022/23',
                        'price' => 30,
                        'image' => 'Jerseys/IRE-22-Home-Front.jpeg',
                        'back_image' => 'Jerseys/IRE-22-Home-Back.jpeg',
                        'description' => 'Republic of Ireland Home jersey for the 2022/23 season. Green with white details.',
                         'size' => 'XL'
                    ],
                    [
                        'name' => 'Republic Of Ireland Away 2023/24',
                        'price' => 30,
                        'image' => 'Jerseys/IRE-23-Away-Front.jpeg',
                        'back_image' => 'Jerseys/IRE-23-Away-Back.jpeg',
                        'description' => 'Republic of Ireland’s away kit for 2023/24. White with modern green design.',
                         'size' => 'XXL'
                    ],
                    [
                        'name' => 'Spain 2017/18',
                        'price' => 60,
                        'image' => 'Jerseys/Spain-1718-front.jpeg',
                        'back_image' => 'Jerseys/Spain-1718-back.jpeg',
                        'description' => 'Classic Spain home jersey from the 2017/18 season. Red with yellow graphics.',
                        'size' => 'M'
                    ],
                    [
                        'name' => 'Germany Away 2022/23',
                        'price' => 40,
                        'image' => 'Jerseys/Ger-22-23-front.jpeg',
                        'back_image' => 'Jerseys/Ger-22-23-back.jpeg',
                        'description' => 'Germany National Team Away Kit for the 2022/23 season.',
                        'size' => 'XXL'
                    ]
                ];
                

                foreach ($jerseys as $product) {
                    echo '
               <div class="product-card">
                  <h3>' . $product['name'] . '</h3>
                    
                    <div class="image-container">
                        <img class="image" src="' . $product['image'] . '" alt="' . $product['name'] . '">
                        <img class="back-image" src="' . $product['back_image'] . '" alt="' . $product['name'] . '">
                    </div>
                   <span class="size-badge">Size: ' . $product['size'] . '</span>
                    <p class="description">' . $product['description'] . '</p>
                    <b><p class="price">€' . number_format($product['price'], 2) . '</b></p>
                    <button class="btn add-to-cart" data-name="' . $product['name'] . '" data-price="' . $product['price'] . '">Add to Cart</button>
                </div>
            ';
                }
                ?>
            </div>
          <br>
        </section>
          
    </div>
   
    <?php include('footer.php'); ?>

</body>

</html>