<?php
// Require database connection
require "database.conn.php";

if (isset($_POST['btnAdminSignin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM user_accounts WHERE email=?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("MySQL prepare statement error: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $resultSet = $result->fetch_assoc();

        // Check if the user is an Admin with the role of Retailer
        if ($resultSet['user_type'] == 'Admin' && $resultSet['user_role'] == 'Retailer') {
            // Verify the password
            if (password_verify($password, $resultSet['password'])) {
                session_start();
                // To get the session name of the logged in user
                $_SESSION["name"] = $resultSet["username"];
                $_SESSION["email"] = $resultSet["email"];

                $stmt->close();
                $conn->close();
                header("location: ../products_table.php");
                exit();
            } else {
                echo '<script language="Javascript">';
                echo 'alert("Invalid credentials.");';
                echo 'window.location.href = "../admin_login.php";';
                echo '</script>';
            }
        } else {
            echo '<script language="Javascript">';
            echo 'alert("Invalid credentials: This login is for Admin Retailers only");';
            echo 'window.location.href = "../admin_login.php";';
            echo '</script>';
        }
    } else {
        echo '<script language="Javascript">';
        echo 'alert("Invalid credentials.");';
        echo 'window.location.href = "../admin_login.php";';
        echo '</script>';
    }

    $stmt->close();
    $conn->close();
} else {
    echo '<script language="Javascript">';
    echo 'alert("Form not submitted.");';
    echo 'window.location.href = "../admin_login.php";';
    echo '</script>';
    die();
}