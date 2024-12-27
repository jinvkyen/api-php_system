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
    $company_name = 'Ayakkusu Merch Store';
    $user_type = 'Admin';
    $user_role = 'Retailer';

    // Start session and set session variables
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
        // Redirect after successful insertion
        header('Location: ../products_table.php');
    } else {
        // Check if user_type and user_role match
        $query_check_user = "SELECT * FROM user_accounts WHERE email=? AND user_type=? AND user_role=?";
        $stmt_check_user = $conn->prepare($query_check_user);

        if (!$stmt_check_user) {
            die("Prepare statement failed: " . $conn->error);
        }

        $stmt_check_user->bind_param("sss", $email, $user_type, $user_role);
        $stmt_check_user->execute();
        $stmt_check_user->store_result();

        if ($stmt_check_user->num_rows > 0) {
            // Update token and verified_email for existing user
            $query = "UPDATE user_accounts SET token=?, verified_email=? WHERE email=?";
            $stmt_update = $conn->prepare($query);

            if (!$stmt_update) {
                die("Prepare statement failed: " . $conn->error);
            }

            $stmt_update->bind_param("sis", $googleToken, $verifiedEmail, $email);

            if (!$stmt_update->execute()) {
                die("Execute statement failed: " . $stmt_update->error);
            }

            $stmt_update->close();
            header('Location: ../products_table.php');
        } else {
            // User exists but does not match user_type and user_role
            echo "<script>
                alert('Access denied.');
                window.location.href = 'admin_login.php';
            </script>";
        }

        $stmt_check_user->close();
    }

    $stmt_check_email->close();
    $conn->close();
    exit();
} else {
    echo "<script>
        alert('Invalid request. Redirecting to login page.');
        window.location.href = 'admin_login.php';
    </script>";
    exit();
}
