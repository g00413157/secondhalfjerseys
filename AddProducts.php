<?php include 'db.php'?>
<?php 
$sql='CREATE TABLE `Merch` (
    `product_id` INT AUTO_INCREMENT PRIMARY KEY,
    `team` VARCHAR(255),
    `year` VARCHAR(255),
    `season` VARCHAR(255),
    `description` TEXT,
    `leaguetype` VARCHAR(50),
    `league` VARCHAR(255),
    `size` VARCHAR(10),
    `price` DECIMAL(10,2),
    `image_url` VARCHAR(255)
  );
  
  INSERT INTO `Merch` (`team`, `year`, `season`, `description`, `leaguetype`, `league`, `size`, `price`, `image_url`) VALUES
  ("Arsenal", "2023/24", "Home", "Official Arsenal home jersey for the 2023/24 season. Classic red and white design.", "Club", "Premier League", "XXL", 50, "Jerseys/Arsenal-24-Home-Front.jpeg"),
  ("Arsenal Women", "2023/24", "Away", "Arsenal Women Away Kit 2023/24", This Jersey includes RUSSO 23 on the back in WSL font", "Club", "WSL", "M", 50, "Jerseys/Arsenal-Women-23-Away-Front.jpeg"),
  ("Arsenal", "2022/23", "Third", "Arsenal Third kit for the 2022/23 season. Pink with Dark Blue accents.", "Club", "Premier League", "S", 40, "Jerseys/Arsenal-22-Third-Front.jpeg"),
  ("Arsenal Women", "2024/25", "Third", "Arsenals Third jersey for the 2024/25 season featuring WILLIAMSON 6 on the back in WSL font and the Barclays Womens Super League patch on the right arm.", "Club", "WSL", "XXL", 60, "Jerseys/Arsenal-Women-24-Third-Front.jpeg"),
  ("Barcelona", "2023/24", "Third", "Barcelona third kit for the 2023/24 season. Unique turquoise design.", "Club", "La Liga", "M", 50, "Jerseys/Barcelona-24-Third-Front.jpeg"),
  ("Crystal Palace", "2022/23", "Home", "Crystal Palace home shirt for the 2022/23 season. Red and blue stripes.", "Club", "Premier League", "XXL", 40, "Jerseys/Palace-2223-front.jpeg"),
  ("Manchester United", "2015/16", "Away", "Manchester United Away shirt from the 2015/16 season. White with red details.", "Club", "Premier League", "XL", 25, "Jerseys/ManchesterUnited-15-Front.jpeg"),
  ("Spain Women", "2023/24", "Home", "Spain National Team Home Kit for 2023/24. Red with Yellow details, Printed with Alexia 11 ", "International", "FIFA", "XXL", 60, "Jerseys/Spain-23-front.jpeg"),
  ("Republic Of Ireland", "2022/23", "Away", "Republic of Ireland Away kit for 2022/23. White with green accents.", "International", "UEFA", "L", 30, "Jerseys/IRE-22-Away-Front.jpeg"),
  ("Republic Of Ireland", "2022/23", "Home", "Republic of Ireland Home jersey for the 2022/23 season. Green with white details.", "International", "UEFA", "XL", 30, "Jerseys/IRE-22-Home-Front.jpeg"),
  ("Republic Of Ireland", "2023/24", "Away", "Republic of Ireland’s away kit for 2023/24. White with modern green design.", "International", "UEFA", "XXL", 30, "Jerseys/IRE-23-Away-Front.jpeg"),
  ("Spain", "2017/18", "Home", "Classic Spain home jersey from the 2017/18 season. Red with yellow graphics.", "International", "UEFA", "M", 60, "Jerseys/Spain-1718-front.jpeg"),
  ("Germany", "2022/23", "Away", "Germany National Team Away Kit for the 2022/23 season.", "International", "UEFA", "XXL", 40, "Jerseys/Ger-22-23-front.jpeg");'
   ?>