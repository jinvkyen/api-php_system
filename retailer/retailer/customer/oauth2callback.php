<?php

require_once 'config.php';
require_once '../customer/includes/db.inc.php';

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
    $company_name = 'N/A';
    $user_type = 'Customer';
    $user_role = 'Buyer';

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
        // If the email already exists, check user_type and user_role
        $query_check_user_type = "SELECT user_type, user_role FROM user_accounts WHERE email=?";
        $stmt_check_user_type = $conn->prepare($query_check_user_type);

        if (!$stmt_check_user_type) {
            die("Prepare statement failed: " . $conn->error);
        }

        $stmt_check_user_type->bind_param("s", $email);
        $stmt_check_user_type->execute();
        $stmt_check_user_type->bind_result($existing_user_type, $existing_user_role);
        $stmt_check_user_type->fetch();

        if ($existing_user_type === 'Customer' && $existing_user_role === 'Buyer') {
            // Proceed with login
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $first_name . ' ' . $last_name;

            header('Location: index.php');
            exit();
        } else {
            // Handle case where user exists but does not match criteria
            echo "<script>
                alert('Email already exists. Access denied.');
                window.location.href = 'login.php';
            </script>";
            exit();
        }
    }

    $stmt_check_email->close();
    $conn->close();
} else {
    echo "<script>
        alert('Invalid request. Redirecting to login page.');
        window.location.href = 'login.php';
    </script>";
    exit();
}
