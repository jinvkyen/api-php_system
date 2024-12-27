<?php

require "database.conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize variables
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $condition = mysqli_real_escape_string($conn, $_POST['prod_condition']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $currency = mysqli_real_escape_string($conn, $_POST['currency']);
    $imgContent = null;
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = file_get_contents($image);
    }
    if ($imgContent !== null) {
        $query = "INSERT INTO products (name, description, category, prod_condition, quantity, status, price, currency, prod_image) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssissds", $name, $description, $category, $condition, $quantity, $status, $price, $currency, $imgContent);
    } else {
        $query = "INSERT INTO products (name, description, category, prod_condition, quantity, status, price, currency) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssisds", $name, $description, $category, $condition, $quantity, $status, $price, $currency);
    }

    if ($stmt->execute()) {
        echo "New item added successfully!";
        header("Location: ../products_table.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}