<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="SIA-Group-7">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Page</title>
    <link rel="icon" href="assets/logo.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Google logo -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Montserrat, sans-serif;
            background: url('images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .registration-container {
            background-color: rgba(255, 255, 255, 0.6);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 600px;
            max-width: 690px;
            width: 100%;
        }

        .form-floating label {
            padding-left: 10px;
        }

        .form-floating input {
            border-radius: 10px;
        }

        .btn-custom {
            background-color: rgba(185, 28, 28);
            color: white;
        }

        .btn-custom:hover {
            background-color: rgba(160, 25, 25);
        }

        .text-highlight {
            color: rgba(185, 28, 28);
        }

        .rounded-logo {
            border-radius: 50%;
            margin-bottom: 2rem;
        }
    </style>
    <script>
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
</head>

<body>
    <div class="registration-container">
        <div class="text-center">
            <a href="homepage.php"><img src="images/logo.png" class="rounded-logo mb-0" style="width: 150px; height: 150px;" alt="Logo"></a>
            <h1 class="h3 mb-3 fw-bold">Create an Exclusive Member Account</h1>
        </div>
        <form action="includes/register.inc.php" method="post" onsubmit="return validatePassword();">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput1" placeholder="First Name" name="fname" required>
                        <label for="floatingInput1">First Name</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput2" placeholder="Last Name" name="lname" required>
                        <label for="floatingInput2">Last Name</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="number" min="1" class="form-control" id="floatingInput3" placeholder="Contact Number" name="contact_no" required>
                        <label for="floatingInput3">Contact Number</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput4" placeholder="Email" name="email" required>
                        <label for="floatingInput4">Email</label>
                    </div>
                </div>
                <!-- User type -->
                <input type="hidden" name="user_type" value="Customer">
                <!-- User role -->
                <input type="hidden" name="user_role" value="Buyer">
                <!-- Company Name -->
                <input type="hidden" name="company_name" value="N/A">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword1" placeholder="Password" name="password" required>
                        <label for="floatingPassword1">Password</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword2" placeholder="Confirm Password" name="confirm_password" required>
                        <label for="floatingPassword2">Confirm Password</label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-check mt-2 mb-3">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                            Agree to our Terms and Conditions
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-custom btn-lg w-100" type="submit" name="btnRegister">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a href="login.php" class="fw-bold text-highlight">Sign In</a></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlJIHj5/3pXw2meIQGHzyE2ErbZpo9SFnP0GxEnkAyTiV2pmSFn1W3p9FaF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG8IY2pSk7orSRL04ujfvcjpz4Y8eG01pMqzjFUw39K4p0RLPNUvm5PKdFI" crossorigin="anonymous"></script>
</body>

</html>
