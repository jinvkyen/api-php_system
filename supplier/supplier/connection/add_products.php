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

    // Handle the uploaded file
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../connection/uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Image Validation
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Check if file already exists
            if (file_exists($target_file)) {
                echo '<script language="Javascript">';
                echo 'alert("Sorry, file already exists.");';
                echo 'window.location.href = "../products_table.php";';
                echo '</script>';
                exit();
            }

            // Check file size (5MB limit)
            if ($_FILES["image"]["size"] > 5000000) {
                echo '<script language="Javascript">';
                echo 'alert("Sorry, file too large.");';
                echo 'window.location.href = "../products_table.php";';
                echo '</script>';
                exit();
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jfif") {
                echo '<script language="Javascript">';
                echo 'alert("Sorry, your image extension is not allowed.")';
                echo 'window.location.href = "../products_table.php";';
                echo '</script>';
                exit();
            }

            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $imgContent = htmlspecialchars(basename($_FILES["image"]["name"]));
            } else {
                echo '<script language="Javascript">';
                echo 'alert("There was an error encountered. Try again later.")';
                echo 'window.location.href = "../product_table.php";';
                echo '</script>';
                exit();
            }
            // Final image validation will display image is not accepted
        } else {
            echo '<script language="Javascript">';
            echo 'alert("File is not an image.");';
            echo 'window.location.href = "../products_table.php";';
            echo '</script>';
            exit();
        }
    }

    // Insert data into the database
    if ($imgContent !== null) {
        $query = "INSERT INTO products (prod_image, name, description, quantity, currency, category, prod_condition, status, price) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssissssd", $imgContent, $name, $description, $quantity, $currency, $category, $condition, $status, $price);
    } else {
        $query = "INSERT INTO products (name, description, quantity, currency, category, prod_condition, status, price) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssissssd", $name, $description, $quantity, $currency, $category, $condition, $status, $price);
    }

    if ($stmt->execute()) {
        echo '<script language="Javascript">';
        echo 'alert("New item added successfully!");';
        echo 'window.location.href = "../products_table.php";';
        echo '</script>';
        exit();
    } else {
        echo '<script language="Javascript">';
        echo 'alert("Error");'. $stmt->error;
        echo 'window.location.href = "../products_table.php";';
        echo '</script>';
    }

    $stmt->close();
    $conn->close();
} else {
    echo '<script language="Javascript">';
    echo 'alert("Invalid request method.");';
    echo 'window.location.href = "../products_table.php";';
    echo '</script>';
}
