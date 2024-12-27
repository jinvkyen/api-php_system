<?php
session_start();
require_once 'config.php';

// Function to fetch product details
function fetchProductDetails($db, $checkoutItems)
{
    $placeholders = implode(',', array_fill(0, count($checkoutItems), '?'));
    $types = str_repeat('i', count($checkoutItems)); // Assuming IDs are integers
    $stmt = $db->prepare("SELECT * FROM products WHERE idproducts IN ($placeholders)");
    if (!$stmt) {
        die("Prepare failed: " . $db->error);
    }
    $stmt->bind_param($types, ...$checkoutItems);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        die("Query failed: " . $stmt->error);
    }
    return $result;
}

// Function to fetch user ID based on email
function fetchUserIdByEmail($db, $email)
{
    $stmt = $db->prepare("SELECT idusers FROM user_accounts WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $db->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id);

    // Initialize variable
    $user_id = null;

    // Fetch the result
    if ($stmt->fetch()) {
        $stmt->close();
        return $user_id;
    } else {
        $stmt->close();
        return null; // Return null if no user is found
    }
}

// Check for payment details
if (isset($_GET['paymentId']) && isset($_GET['PayerID'])) {
    $transaction = $gateway->completePurchase([
        'payer_id' => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ]);

    $response = $transaction->send();

    if ($response->isSuccessful()) {
        $arr_body = $response->getData();

        // Extract payment details
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];

        // Fetch user ID from session email
        $email = $_SESSION['email'];
        $user_id = fetchUserIdByEmail($db, $email);

        // Check if user ID was fetched correctly
        if ($user_id === null) {
            die('Error: User ID could not be found.');
        }

        // Insert payment details into the database
        $stmt = $db->prepare("INSERT INTO payments (payment_id, payer_id, payer_email, amount, currency, payment_status, idusers) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $db->error);
        }

        $stmt->bind_param("ssssssi", $payment_id, $payer_id, $payer_email, $amount, $currency, $payment_status, $user_id);
        $stmt->execute();
        $stmt->close();

        // Assuming the status is 'approved'
        $status = 'approved';
        $currency ='PhP';

        // Get the current date and time
        $order_date = date('Y-m-d H:i:s'); // Format should match your database schema

        // Insert order details
        $stmt = $db->prepare("INSERT INTO orders (payment_id, order_date, amount, currency, idusers, status) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $db->error);
        }

        $stmt->bind_param("ssssis", $payment_id, $order_date, $amount, $currency, $user_id, $status);
        $stmt->execute();
        $order_id = $stmt->insert_id; // Get the ID of the inserted order
        $stmt->close();

        $currency ='PhP';

        // Fetch checkout items
        if (isset($_SESSION['checkout_items']) && is_array($_SESSION['checkout_items'])) {
            $checkoutItems = $_SESSION['checkout_items'];
            $totalAmount = 0;

            // Retrieve product details from the database
            $result = fetchProductDetails($db, $checkoutItems);



?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Success</title>
<link rel="icon" href="../../assets/logo.ico" type="image/x-icon">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: url('../images/bg.jpg') no-repeat center center fixed;
    background-size: cover;
}
</style>
</head>

<body>
<div class="container mt-5">
<div class="card shadow-lg">
    <div class="card-header text-center">
        <h2 class="card-title">Order Confirmation</h2>
        <p class="card-subtitle">Order Number: <?php echo htmlspecialchars($payment_id); ?></p>
        <p class="card-subtitle">Order Date: <?php echo htmlspecialchars(date("F j, Y, g:i a")); ?></p>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Description</th>
                    <th scope="col">Currency and Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($product = $result->fetch_assoc()) {
                        $idproduct = $product['idproducts'];
                        $productName = htmlspecialchars($product['name']);
                        $productDescription = htmlspecialchars($product['description']);
                        $productPrice = $product['price'];
                        $productCurrency = htmlspecialchars($product['currency']);
                        $productQuantity = isset($_SESSION['cart'][$idproduct]['quantity']) ? $_SESSION['cart'][$idproduct]['quantity'] : 1;
                        $itemTotal = $productPrice * $productQuantity;
                        $totalAmount += $itemTotal;
    
                        // Insert order details into the database
                        $stmt = $db->prepare("INSERT INTO order_details (order_id, product_id, product_name, product_price, quantity, item_total) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("iisdis", $order_id, $idproduct, $productName, $productPrice, $productQuantity, $itemTotal);
                        $stmt->execute();
                        $stmt->close();

                        echo '<tr>';
                        echo '<td>' . $productName . '</td>';
                        echo '<td>' . $productDescription . '</td>';
                        echo '<td>' . $productCurrency . ' ' . number_format($productPrice, 2) . '</td>';
                        echo '<td>' . $productQuantity . '</td>';
                        echo '<td>' . $productCurrency . ' ' . number_format($itemTotal, 2) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5" class="text-center">No items found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <div class="text-right mt-3">
            <p class="h5">Total Amount: <?php echo htmlspecialchars($currency) . ' ' . number_format($totalAmount, 2); ?></p>
        </div>
    </div>
    <div class="card-footer text-center">
        <p class="mb-3">Thank you for your purchase! 💛</p>
        <a href="../index.php" class="btn btn-outline-primary btn-lg" onclick="clearCart()">Continue Shopping</a>
    </div>
</div>
</div>

<script>
function clearCart() {
    <?php
    unset($_SESSION['cart']);
    unset($_SESSION['checkout_items']);
    ?>
}
</script>
</body>

</html>
<?php
} else {
echo '<p>No items selected for checkout.</p>';
}
} else {
echo 'Payment was not successful. ' . htmlspecialchars($response->getMessage());
}
} else {
echo 'Invalid transaction details.';
}
?>