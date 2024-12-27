<?php
session_start();
require '../../retailer/connection/database.conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idproduct = $_POST['idproduct'];

    // Fetch product details from the database
    $query = "SELECT name, price, currency, description FROM products WHERE idproducts = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $idproduct);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$idproduct])) {
            $_SESSION['cart'][$idproduct]['quantity']++;
        } else {
            // Add product details to the cart
            $_SESSION['cart'][$idproduct] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'currency' => $product['currency'],
                'description' => $product['description'],
                'quantity' => 1
            ];
        }
    }

    $stmt->close();
    $conn->close();
}

// Redirect back to the merchandise page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
