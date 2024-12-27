<?php
require "db.inc.php";
session_start();

if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM user_accounts WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check if the user is an Admin with the role of Retailer
        if ($user['user_type'] == 'Admin' && $user['user_role'] == 'Retailer') {
            echo '<script language="Javascript">';
            echo 'alert("Invalid credentials: This login is for Customers only.");';
            echo 'window.location.href = "../login.php";';
            echo '</script>';
        } else {
            // Verify the hashed password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION["idusers"] = $user["idusers"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["fname"] = $user["fname"];
                $_SESSION['logged'] = true;

                // Redirect to the homepage
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header("location: ../index.php?id=" . $_SESSION['idusers']);
                exit();
            } else {
                echo '<script language="Javascript">';
                echo 'alert("Invalid credentials.");';
                echo 'window.location.href = "../login.php";';
                echo '</script>';
            }
        }
    } else {
        echo '<script language="Javascript">';
        echo 'alert("Invalid credentials.");';
        echo 'window.location.href = "../login.php";';
        echo '</script>';
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} else {
    echo '<script language="Javascript">';
    echo 'alert("Invalid request.");';
    echo 'window.location.href = "../login.php";';
    echo '</script>';
    exit();
}
