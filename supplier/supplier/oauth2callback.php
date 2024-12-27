<?php

require_once 'config.php';
require_once 'connection/database.conn.php';

if (isset($_GET['code'])) {
    // Fetch the access token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (isset($token['error'])) {
        die("Error fetching access token: " . $token['error_description']);
    }
    $client->setAccessToken($token['access_token']);

    // Get user profile information from Google
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();

    // Extract user data
    $email = $userInfo->email;
    $first_name = $userInfo->givenName;
    $last_name = $userInfo->familyName;
    $verifiedEmail = $userInfo->verifiedEmail ? 1 : 0;
    $googleToken = $token['access_token'];

    // Set default values for the missing columns
    $contact_no = 'undisclosed';
    $company_name = 'Cunosati Supplier Company';
    $user_type = 'Admin';
    $user_role = 'Supplier';

    // Start session and set session variables
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $first_name . ' ' . $last_name;

    // Check if the user already exists
    $query_check_email = "SELECT * FROM user_accounts WHERE email=?";
    $stmt_check_email = $conn->prepare($query_check_email);

    if (!$stmt_check_email) {
        die("Prepare statement failed: " . $conn->error);
    }

    $stmt_check_email->bind_param("s", $email);
    $stmt_check_email->execute();
    $stmt_check_email->store_result();

    if ($stmt_check_email->num_rows == 0) {
        // Insert new user into the database
        $query = "INSERT INTO user_accounts (fname, lname, contact_no, email, password, company_name, user_type, user_role, verified_email, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Prepare statement failed: " . $conn->error);
        }

        $hashed_password = password_hash($googleToken, PASSWORD_DEFAULT);
        $stmt->bind_param("ssisssssis", $first_name, $last_name, $contact_no, $email, $hashed_password, $company_name, $user_type, $user_role, $verifiedEmail, $googleToken);

        if (!$stmt->execute()) {
            die("Execute statement failed: " . $stmt->error);
        }

        $stmt->close();
    } else {
        // Update token and verified_email for existing user
        $query = "UPDATE user_accounts SET token=?, verified_email=? WHERE email=?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Prepare statement failed: " . $conn->error);
        }

        $stmt->bind_param("sis", $googleToken, $verifiedEmail, $email);

        if (!$stmt->execute()) {
            die("Execute statement failed: " . $stmt->error);
        }

        $stmt->close();
    }

    $stmt_check_email->close();
    $conn->close();

    header('Location: products_table.php');
    exit();
} else {
    header('Location: admin_login.php');
    exit();
}