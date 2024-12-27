<?php
require_once 'config.php';
if (isset($_SESSION['user_token'])) {
   header("Location: products_table.php");
 } else {
   $login_url = $client->createAuthUrl();
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="SIA-Group-7">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Login Page</title>
    <link rel="icon" href="assets/supplier-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../supplier/assets/bootstrap.css">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- Bootstrap JS and dependencies -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="../supplier/js/bootstrap.bundle.min.js"></script>


    <style>
        body {
            background-color: cornflowerblue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .login-container img {
            width: 100px;
            margin-bottom: 0rem;
        }

        .login-container button {
            width: 100%;
        }

        .login-container .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .login-container .social-login {
            display: flex;
            justify-content: space-around;
            margin-top: 1rem;
        }

        .login-container .social-login button {
            width: 100%;
        }

        .login-container .help-link {
            margin-top: 0rem;
            text-align: left;
            font-size: small;

        }

        .login-container .sign-up-link {
            margin-top: 0.5rem;
            font-size: 14px;
            margin-bottom: 0px;
        }

        .illustrations {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .illustrations img {
            width: 48%;
        }

        .btn.btn-outline-info {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.5s ease;
            
        }

        .btn.btn-outline-info:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3);
            
        }
    </style>
</head>

<body>

    <div class="login-container">
        <img src="../supplier/assets/supplier-logo.png" alt="Logo">
        <br>
        <h1 class="h3 mb-3 fw-bold">Login your Supplier Admin Account</h1>
        <form action="connection/admin_login.conn.php" method="post">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="example@gmail.com" name="email">
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="help-link mt-1">
                <a href="#">Forgot email or password?</a>
            </div>
            <div class="form-group form-check mt-3">
                <input type="checkbox" class="form-check-input" id="rememberDevice" name="remember">
                <label class="form-check-label" for="rememberDevice">Remember this device</label>
            </div>
            <button class="btn btn-outline-info" type="submit" name="btnAdminSignin">Sign In</button>
        </form>
        <!-- Button for Google Client API -->
        <div class="social-login">
            <a href="<?= htmlspecialchars($login_url) ?>" class="btn btn-outline-secondary btn-block">
                <img src="assets/google_logo.png" alt="Google Logo" style="width:20px; height:auto; flex-direction: row; justify-content: center; align-items: center; margin-top:3px; margin-right: 7px; padding:0px; margin-bottom:4px;">
                <strong>Continue with Google</strong>
            </a>
        </div>
        <div class="sign-up-link">
            <p>Don't have an employee account? <a href="admin_register.php">Register</a></p>
        </div>
        <div class="sign-up-link">
            <a href="../retailer/admin_login.php">Login to AYAKKUSU: Merchandise Retail Store</a>
        </div>
    </div>

</body>

</html>