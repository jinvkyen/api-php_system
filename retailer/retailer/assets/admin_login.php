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
    <title>Retailer Login Page</title>
    <link rel="icon" href="assets/logo.ico" type="image/x-icon">
    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Montserrat, sans-serif;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            max-width: 100%;
            background-color: #ffffff;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            overflow: hidden;
        }

        @media (min-width: 768px) {
            .container {
                flex-direction: row;
                justify-content: space-between;
            }
        }

        .login-container {
            text-align: center;
            width: 50%;
            box-sizing: border-box;
            padding: 5rem;
        }

        .login-container img.logo {
            width: 130px;
            margin-bottom: 0.5rem;
        }

        .login-container button {
            width: 100%;
        }

        .login-container .form-group {
            margin-bottom: 2.5rem;
            text-align: left;
        }

        .login-container .social-login button {
            width: 100%;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container .help-link {
            margin-top: 1rem;
            text-align: left;
            font-size: small;
        }

        .illustration-container {
            text-align: center;
            width: 50%;
            padding: 1rem;
            box-sizing: border-box;
        }

        .illustration-container img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <img src="../retailer/assets/logo.ico" alt="Logo" class="logo mx-auto">
            <p class="h4 mb-1 fw-bold font-mono">AYAKKUSU: Merchandise Retail Store</p>
            <p class="text-sm mb-3 font-mono">Please enter your details.</p>
            <?php
            if (isset($_SESSION['success'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>
            <form action="connection/admin_login.conn.php" method="post">
                <div class="form-floating mb-3 font-mono">
                    <input type="email" class="form-control" id="floatingInput" placeholder="example@gmail.com" name="email">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating font-mono">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="help-link mt-1">
                    <a href="#" class="no-underline text-red-800 hover:text-red-500 hover:no-underline font-mono">Forgot email or password?</a>
                </div>
                <div class="form-group form-check mt-3 mb-3 font-mono">
                    <input type="checkbox" class="form-check-input" id="rememberDevice" name="remember">
                    <label class="form-check-label" for="rememberDevice">Remember this device</label>
                </div>
                <button class="btn btn-lg btn-danger btn-block font-mono" type="submit" name="btnAdminSignin"><strong>Sign In</strong></button>
            </form>
            <!-- Button for Google Client API -->
            <div class="social-login flex justify-center mt-2 btn-block font-mono">
                <a href="<?= htmlspecialchars($login_url) ?>" class="btn btn-outline-secondary d-flex align-items-center justify-center text-black px-3 py-2 hover:text-white">
                    <img src="assets/google-logo.png" alt="Google Logo" class="mr-2 h-6 w-auto">
                    Continue with Google
                </a>
            </div>
            <div class="sign-up-link mt-3 font-mono">
                <p class="text-sm">Don't have an employee account? <a href="admin_register.php" class="no-underline text-red-800 hover:text-red-500 hover:no-underline">Register</a></p>
            </div>
        </div>
        <!-- Right Side -->
        <div class="illustration-container">
            <img src="assets/login-pic.png" alt="Illustration">
        </div>
    </div>
</body>

</html>