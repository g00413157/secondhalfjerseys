<?php
$host = "localhost";
$username = "kwbz5h6_admin";
$password = "aDmin654321qwertyu";
$database = "kwbz5h6_secondhalfjerseysdb";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>
