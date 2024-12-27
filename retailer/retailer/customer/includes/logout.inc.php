<?php 
session_start();
require 'db.inc.php';

if (isset($_SESSION['idusers']) && isset($_SESSION['cart'])) {
    $userId = $_SESSION['idusers'];
    $cartItems = $_SESSION['cart'];
    
    $cartData = serialize($cartItems);
    
    // Save the cart data to the database
    $stmt = $conn->prepare("UPDATE user_accounts SET cart_data = ? WHERE idusers = ?");
    $stmt->bind_param('si', $cartData, $userId);
    $stmt->execute();
    $stmt->close();
}

unset($_SESSION['user_token']);
session_destroy();
header("Location: ../login.php?status=loggedout");
