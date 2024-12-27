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

    // Fetch old image path from database
    $fetch_query = "SELECT prod_image FROM products WHERE idproducts=?";
    $fetch_stmt = $conn->prepare($fetch_query);
    $fetch_stmt->bind_param("i", $id);
    $fetch_stmt->execute();
    $fetch_stmt->bind_result($old_image);
    $fetch_stmt->fetch();
    $fetch_stmt->close();

    // Check if a new image file has been uploaded
    if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../connection/uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Image validation
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        // Check file size (5MB limit)
        if ($_FILES["image"]["size"] > 5000000) {
            echo '<script language="Javascript">';
            echo 'alert("Sorry, your file is too large.");';
            echo 'window.location.href = "../products_table.php";';
            echo '</script>';
            exit();
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jfif") {
            echo '<script language="Javascript">';
            echo 'alert("Sorry, your image file extension is not allowed.");';
            echo 'window.location.href = "../products_table.php";';
            echo '</script>';
            exit();
        }

        // Upload the new file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Delete old image if it exists
            if (!empty($old_image)) {
                $old_image_path = "../connection/uploads/" . $old_image;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            // Update query with new image
            $image_name = basename($_FILES["image"]["name"]);
            $query = "UPDATE products SET name=?, description=?, category=?, prod_condition=?, quantity=?, status=?, price=?, currency=?, prod_image=? WHERE idproducts=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssissdsi", $name, $description, $category, $condition, $quantity, $status, $price, $currency, $image_name, $id);
        } else {
            echo '<script language="Javascript">';
            echo 'alert("Sorry, there was an error uploading your file.");';
            echo 'window.location.href = "../products_table.php";';
            echo '</script>';
            exit();
        }
    } else {
        // Update query without new image
        $query = "UPDATE products SET name=?, description=?, category=?, prod_condition=?, quantity=?, status=?, price=?, currency=? WHERE idproducts=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssisssi", $name, $description, $category, $condition, $quantity, $status, $price, $currency, $id);
    }

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script language="Javascript">';
        echo 'alert("Product updated successfully!");';
        echo 'window.location.href = "../products_table.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
