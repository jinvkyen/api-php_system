<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Cancelled</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('../images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 1.5rem;
            text-align: center;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 1rem 1.5rem;
            text-align: center;
        }
        .card-body {
            padding: 2rem 1.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        .footer-text {
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h3 class="mb-0">Payment Cancelled</h3>
                    </div>
                    <div class="card-body text-center">
                        <p class="mb-4 fs-4">Your payment was not completed. You may return to the Homepage.</p>
                        <img src="../merchant/images/sad.jpg" alt="order cancelled" class="mb-4" style="width:220px; height:220px;">
                        <div class="card-footer">
                            <p class="footer-text mb-3">If you have any questions, please contact our support team.</p>
                            <a href="../index.php" class="btn btn-outline-primary btn-lg">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
