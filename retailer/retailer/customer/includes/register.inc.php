<?php
// Require database connection
require "db.inc.php";

if (isset($_POST['btnRegister'])) {
    // User inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

    // Check if password and confirm password match
    if ($password != $confirm_password) { // Successful registration
        echo '<script language="Javascript">';
        echo 'alert("Credentials do not match.");';
        echo 'window.location.href = "../register.php";';
        echo '</script>';
        exit();
    }

    // Check if email already exists
    $query_check_email = "SELECT * FROM user_accounts WHERE email=?";
    $stmt_check_email = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt_check_email, $query_check_email)) {
        echo '<script language="Javascript">';
        echo 'alert("An error occurred.");';
        echo 'window.location.href = "../login.php";';
        echo '</script>';
        exit();
    } else {
        mysqli_stmt_bind_param($stmt_check_email, "s", $email);
        mysqli_stmt_execute($stmt_check_email);
        mysqli_stmt_store_result($stmt_check_email);

        if (mysqli_stmt_num_rows($stmt_check_email) > 0) {
            echo '<script language="Javascript">';
            echo 'alert("Email already exists. Please choose a different email.");';
            echo 'window.location.href = "../register.php";';
            echo '</script>';
            exit();
        }
    }

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertion of data into the database using prepared statements to prevent SQL injection
    $query = "INSERT INTO user_accounts (fname, lname, contact_no, email, password, company_name, user_type, user_role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("SQL error");
    } else {
        mysqli_stmt_bind_param($stmt, "ssisssss", $first_name, $last_name, $contact_no, $email, $hashed_password, $company_name, $user_type, $user_role);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        // Successful registration
        echo '<script language="Javascript">';
        echo 'alert("Account successfully created.");';
        echo 'window.location.href = "../login.php";';
        echo '</script>';
        exit();
    }
} else {
    echo '<script language="Javascript">';
    echo 'alert("Form not submitted.");';
    echo 'window.location.href = "../register.php";';
    echo '</script>';
    die();
}
