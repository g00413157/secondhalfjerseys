<?php
session_start();
include 'db.php';

if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    echo "Error: Cart is empty. Please add items to your cart first.";
    exit();
}

if (isset($_POST['submit_payment'])) {

    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    $card_number = htmlspecialchars($card_number);
    $expiry_date = htmlspecialchars($expiry_date);
    $cvv = htmlspecialchars($cvv);

    if (empty($card_number) || empty($expiry_date) || empty($cvv)) {
        echo "Error: Please fill all the payment details.";
        exit();
    }

    try {
        header("Location: thankyou.php");
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>