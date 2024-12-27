<?php
require_once 'config.php';
if (isset($_SESSION['user_token'])) {
    header("Location: index.php");
} else {
    $login_url = $client->createAuthUrl();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Login Page</title>
  <link rel="icon" href="assets/logo.ico" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Font Awesome for Google logo -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: Montserrat, sans-serif;
      background: url('images/bg.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-custom {
      background-color: rgba(185, 28, 28);
      color: white;
    }

    .btn-custom:hover {
      background-color: rgba(160, 25, 25);
    }

    .form-label {
      color: #495057;
    }

    .text-highlight {
      color: rgba(300, 28, 28);
    }

    .rounded-logo {
      border-radius: 50%;
    }

    .brighter-text {
      color: #fff;
    }

    .separator {
      text-align: center;
      border-bottom: 1px solid #ddd;
      line-height: 0.1em;
      margin: 20px 0;
    }

    .separator span {
      padding: 0 10px;
    }

    .google-button {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: white;
      border: 1px solid #ccc;
      padding: 10px;
      width: 100%;
      color: #555;
      text-align: center;
      font-weight: bold;
      cursor: pointer;
    }

    .google-button .link {
      text-decoration: none;
      color: #555;
    }

    .google-button img {
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <section class="vh-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-6 mb-5 mb-lg-0 text-center">
          <a href="homepage.php"><img src="assets/logo.png" class="rounded-logo mb-0" style="width: 250px; height: 250px;" alt="Logo"></a>
          <h1 class="my-5 display-3 fw-bold ls-tight brighter-text">
            Welcome To <br />
            <span class="text-highlight">Ayakkusu Merch Shop!</span>
          </h1>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <?php
              if (isset($_SESSION['success'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']); // Clear the message after displaying it
              }
              if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']); // Clear the message after displaying it
              }
              ?>

              <form action="includes/login.inc.php" method="post" autocomplete="off">
                <h1 class="text-center my-3 display-8 fw-bold ls-tight">
                  Exclusive Member
                </h1>

                <!-- Email input -->
                <div class="form-floating mb-4">
                  <input type="email" name="email" id="form3Example3" class="form-control" placeholder="Enter Your Email...." />
                  <label for="form3Example3">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-floating mb-4">
                  <input type="password" name="password" id="form3Example4" class="form-control" placeholder="Enter Your Password...." />
                  <label for="form3Example4">Password</label>
                </div>

                <!-- Submit button -->
                <div class="d-flex justify-content-center mb-3">
                  <button class="btn btn-custom btn-lg w-100" type="submit" name="btnLogin">Sign In</button>
                </div>

                <!-- Separator -->
                <div class="separator"><span>OR</span></div>

                <!-- Button for Google Client API -->
                <div class="d-flex justify-content-center mt-3">
                  <a href="<?= htmlspecialchars($login_url) ?>" class="google-button">
                    <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo">Continue with Google
                  </a>
                </div>

                <div class="text-center mt-4">
                  <p>Don't have an account? <a href="register.php" class="fw-bold text-highlight">Sign Up Your Account</a></p>
                </div>
              </form>
            </div>
          </div>
          <p class="text-white flex justify-end">Image from Susann Schuster from Kanda Myōjin (Kanda Shrine)</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlJIHj5/3pXw2meIQGHzyE2ErbZpo9SFnP0GxEnkAyTiV2pmSFn1W3p9FaF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG8IY2pSk7orSRL04ujfvcjpz4Y8eG01pMqzjFUw39K4p0RLPNUvm5PKdFI" crossorigin="anonymous"></script>
</body>

</html>
