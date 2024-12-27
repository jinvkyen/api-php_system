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
    </style>
</head>

<body class="bg-red-700 overflow-hidden">
    <div class="flex h-screen overflow-hidden">
        <!-- Include Sidebar -->
        <?php //include '../retailer/partials/sidebar.php'; ?>
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Include Topbar -->
            <?php include '../retailer/partials/topbar.php'; ?>
            <main class="p-6 flex-1 overflow-y-auto">
                <!-- Content of Retailer Products Table -->
                <?php include 'partials/content.php'; ?>
            </main>
        </div>
    </div>

    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!-- Custom JS for DataTable initialization -->
    <script src="../retailer/js/scripts.js"></script>
</body>

</html>