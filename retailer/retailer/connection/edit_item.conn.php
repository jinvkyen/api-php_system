<?php
require "database.conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $condition = mysqli_real_escape_string($conn, $_POST['prod_condition']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $currency = mysqli_real_escape_string($conn, $_POST['currency']);

    if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = file_get_contents($image);
        $query = "UPDATE products SET name=?, description=?, category=?, prod_condition=?, quantity=?, status=?, price=?, currency=?, prod_image=? WHERE idproducts=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssissdsi", $name, $description, $category, $condition, $quantity, $status, $price, $currency, $imgContent, $id);
    } else {
        $query = "UPDATE products SET name=?, description=?, category=?, prod_condition=?, quantity=?, status=?, price=?, currency=? WHERE idproducts=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssisssi", $name, $description, $category, $condition, $quantity, $status, $price, $currency, $id);
    }

    if ($stmt->execute()) {
        echo "Product updated successfully!";
        header("Location: ../products_table.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
