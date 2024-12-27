<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout_items'])) {
    // Check if selected items are provided and are an array
    if (isset($_POST['select']) && is_array($_POST['select'])) {
        $selectedItems = $_POST['select'];

        // Handle quantity updates if provided
        if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $idproduct => $quantity) {
                $idproduct = intval($idproduct); // Convert to integer
                $quantity = intval($quantity); // Convert to integer
                if ($quantity > 0) {
                    $_SESSION['cart'][$idproduct]['quantity'] = $quantity; // Update quantity
                } else {
                    unset($_SESSION['cart'][$idproduct]); // Remove item if quantity is 0 or less
                }
            }
        }

        // Store selected items in session for processing later
        $_SESSION['checkout_items'] = $selectedItems;

        // Redirect to the order details page
        header("Location: orderDetails.php");
        exit();
    }
} else {
    // Handle incorrect form submission
    header("Location: index.php");
    exit();
}
