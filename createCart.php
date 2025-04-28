<?php
// Database connection details
$servername = "localhost";
$username = "kwbz5h6_admin";
$password = "aDmin654321qwertyu";
$database = "kwbz5h6_secondhalfjerseysdb";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database '$database' created successfully (if not already exists).<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Use the database
$conn->select_db($database);

// Create the `cart` table
$sql = "CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,       
    user_id INT NOT NULL,                    
    item_id INT NOT NULL,                    
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES merchandise(id), 
    INDEX (user_id)                          
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'cart' created successfully.<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Close connection
$conn->close();
?>
