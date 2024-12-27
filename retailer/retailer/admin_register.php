<!DOCTYPE html>
<html lang="en">

<head>
<meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="SIA-Group-7">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
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
    <script>
        // JavaScript function to validate password match
        function validatePassword() {
            var password = document.getElementById("floatingPassword1").value;
            var confirmPassword = document.getElementById("floatingPassword2").value;

            if (password != confirmPassword) {
                alert("Password and Confirm Password do not match.");
                return false;
            }
            return true;
        }
    </script>
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
            width: 70%;
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
            <form action="connection/admin_register.conn.php" method="post" onsubmit="return validatePassword();">
                <div class="form-floating mb-3 font-mono"><!--first name-->
                    <input type="text" class="form-control" id="floatingInput1" placeholder="First Name" name="fname" required>
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="form-floating mb-3 font-mono"><!--last name-->
                    <input type="text" class="form-control" id="floatingInput2" placeholder="Last Name" name="lname" required>
                    <label for="floatingInput">Last Name</label>
                </div>
                <div class="form-floating mb-3 font-mono"><!--contact info-->
                    <input type="text" class="form-control" id="floatingInput3" placeholder="Contact Number" name="contact_no" required>
                    <label for="floatingInput">Contact Number</label>
                </div>
                <div class="form-floating mb-3 font-mono"><!--email-->
                    <input type="email" class="form-control" id="floatingInput4" placeholder="Email" name="email" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3 font-mono"><!--password-->
                    <input type="password" class="form-control" id="floatingPassword1" placeholder="Password" name="password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3 font-mono"><!--confirm password-->
                    <input type="password" class="form-control" id="floatingPassword2" placeholder="Confirm Password" name="confirm_password" required>
                    <label for="floatingPassword">Confirm Password</label>
                </div>
                <!-- User type -->
                <input type="hidden" name="user_type" value="Admin">
                <!-- User role -->
                <input type="hidden" name="user_role" value="Retailer">
                <!-- Company Name -->
                <input type="hidden" name="company_name" value="Ayakkusu Merch Store">
                <!-- Terms and Conditions -->
                <div class="col-lg-12">
                    <div class="form-check mt-4 mb-3">
                        <input class="form-check-input" style="border:1px solid;"type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                            Agree to our Terms and Conditions
                        </label>
                    </div>
                </div>
                <button class="btn btn-lg btn-danger btn-block font-mono" type="submit" name="btnAdminRegister"><strong>Register</strong></button>
            </form>
        <div class="sign-up-link pt-4">
            <p>Want to register an exclusive member account? <a href="../retailer/customer/register.php" class="no-underline text-red-800 hover:text-red-500 hover:no-underline">Register</a></p>
        </div>
        <div class="sign-up-link-2">
            <a href="admin_login.php" class="no-underline text-red-800 hover:text-red-500 hover:no-underline">Go Back</a>
        </div>
        </div>
        <!-- Right Side -->
        <div class="illustration-container">
            <img src="assets/login-pic.png" alt="Illustration">
        </div>
    </div>
</body>

</html>