<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db.php'; 

$session_id = session_id();

if (isset($_POST['submit_payment'])) {

   
    $card_number = htmlspecialchars(trim($_POST['card_number']));
    $expiry_date = htmlspecialchars(trim($_POST['expiry_date']));
    $cvv = htmlspecialchars(trim($_POST['cvv']));

    if (empty($card_number) || empty($expiry_date) || empty($cvv)) {
        echo "Error: Please fill in all payment details.";
        exit();
    }

    $stmt = $conn->prepare("DELETE FROM cart WHERE session_id = ?");
    $stmt->bind_param("s", $session_id);

    if ($stmt->execute()) {
        
        header("Location: thankyou.php");
        exit();
    } else {
        echo "Error: Could not clear cart. Please contact support.";
        exit();
    }

} else {
    echo "Error: Invalid access.";
    exit();
}
?>
