<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: admin_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retailer Products</title>
    <link rel="icon" href="assets/logo.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        .content-wrapper {
            height: calc(100vh - 64px);
        }

        .nav-link {
            color: black !important;
        }

        .nav-link:hover {
            color: red !important;
            text-decoration: none;
        }
    </style>
</head>

<body class="bg-red-700 overflow-hidden">
    <header class="bg-white p-2">
        <div class="p-2 ml-10 flex justify-evenly items-center">
            <img src="assets/logo.png" class="h-28" alt="Logo">
            <h1 class="text-2xl"><a href="../retailer/transactions.php" class="nav-link"><i class="fa-solid fa-cart-shopping"></i> Transactions</a></h1>
            <h1 class="text-2xl"><a href="../retailer/products_table.php" class="nav-link"><i class="fa-solid fa-box"></i> Products</a></h1>
            <h1 class="text-2xl mr-5"><a href="connection/logout.conn.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></h1>
        </div>
    </header>
    <main class="p-6 flex-1 overflow-y-auto">
        <?php
        include 'connection/database.conn.php';

        $limit = 5; // Number of entries to show in a page
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {
            $page = 1;
        };

        $start_from = ($page - 1) * $limit;

        // Corrected query to join the order_details and orders tables with pagination
        $sql = "SELECT 
            od.product_id, 
            o.idusers, 
            od.order_id, 
            o.order_date, 
            o.status, 
            o.payment_id, 
            o.amount, 
            o.currency, 
            od.product_name, 
            od.product_price, 
            od.quantity, 
            od.item_total 
        FROM order_details od
        JOIN orders o ON od.order_id = o.order_id
        LIMIT $start_from, $limit";

        $result = $conn->query($sql);

        // Get total number of records
        $sql_total = "SELECT COUNT(*) FROM order_details od JOIN orders o ON od.order_id = o.order_id";
        $result_total = $conn->query($sql_total);
        $row_total = $result_total->fetch_row();
        $total_records = $row_total[0];

        $total_pages = ceil($total_records / $limit);
        ?>

        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Transaction Details</h2>
                </div>
                <div class="card-body">
                    <?php
                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered table-hover'>";
                        echo "<thead class='thead-dark'><tr><th>Product ID</th><th>Product Name</th><th>Order ID</th><th>Order Date</th><th>Status</th><th>Payment ID</th><th>Currency</th><th>Quantity</th><th>Product Price</th><th>User ID</th></tr></thead>";
                        echo "<tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['product_id'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['order_id'] . "</td>";
                            echo "<td>" . $row['order_date'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['payment_id'] . "</td>";
                            echo "<td>" . $row['currency'] . "</td>";
                            echo "<td>" . $row['quantity'] . "</td>";
                            echo "<td>" . $row['product_price'] . "</td>";
                            echo "<td>" . $row['idusers'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "<div class='no-data'>No transactions found.</div>";
                    }

                    $conn->close();
                    ?>
                </div>
                <div class="card-footer">
                    <nav>
                        <ul class="pagination">
                            <?php
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item";
                                if ($i == $page) echo " active";
                                echo "'><a class='page-link' href='transaction_details.php?page=" . $i . "'>" . $i . "</a></li>";
                            };
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
