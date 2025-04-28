<?php
$servername = "localhost";
$username = "kwbz5h6_admin";
$password = "aDmin654321qwertyu";
$db_name = "kwbz5h6_secondhalfjerseysdb";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>
