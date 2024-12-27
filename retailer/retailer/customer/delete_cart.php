<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_items'])) {
    if (isset($_POST['select']) && is_array($_POST['select'])) { // Corrected input name
        foreach ($_POST['select'] as $idproduct) {
            if (isset($_SESSION['cart'][$idproduct])) {
                unset($_SESSION['cart'][$idproduct]);
            }
        }
    }
    // Redirect back to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
