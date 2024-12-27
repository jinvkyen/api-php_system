<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="SIA-Group-7">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="icon" href="assets/supplier-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../supplier/assets/bootstrap.css">


    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="../supplier/js/bootstrap.bundle.min.js"></script>

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
            background-color: cornflowerblue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;

        }

        .login-container .social-login button {
            width: 100%;
        }

        .login-container .sign-up-link-2 {
            display: flex;
            justify-content: flex-end;
        }

        body,
        html {
            height: 100%;
        }

        .vertical-center {
            min-height: 100%;
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container vertical-center">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="login-container text-center p-4 border rounded shadow">
                    <img src="assets/supplier-logo.png" alt="Logo" style="width: 150px; height: auto;">
                    <h1 class="h3 mb-3 fw-bold">Create an Administrator Supplier Account</h1>
                    <form action="connection/admin_register.conn.php" method="post" onsubmit="return validatePassword();">
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
                            <!-- User type -->
                            <input type="hidden" name="user_type" value="Admin">
                            <!-- User role -->
                            <input type="hidden" name="user_role" value="Supplier">
                            <!-- Company Name -->
                            <input type="hidden" name="company_name" value="Cunosati Supplier Company">
                        </div>
                        <div class="row">
                            <div class="social-login">
                                <button class="btn btn-primary border-1 border-bottom" type="submit" name="btnAdminRegister">Register</button>
                            </div>
                        </div>
                    </form>
                    <div class="sign-up-link-2 mt-3">
                        <button class="btn btn-outline-secondary btn-sm" onclick="location.href='admin_login.php';">Go Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>