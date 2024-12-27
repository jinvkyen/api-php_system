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
    <title>Supplier Products</title>
    <link rel="icon" href="assets/supplier-logo.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../supplier/assets/bootstrap.css">

    <style>
        .content-wrapper {
            height: calc(100vh - 64px);
        }
    </style>
</head>

<body class=" overflow-hidden" style="background-color: cornflowerblue;">
    <div class="flex h-screen overflow-hidden">

        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Include Topbar -->
            <?php include '../supplier/partials/topbar.php'; ?>

            <!-- Content of Supplier Products Table -->
            <?php include '../supplier/partials/content.php'; ?>

            <!-- Include Footer -->
            <div class="my-1"></div> <!--margin at bottom table -->
        </div>
    </div>

    <!-- Include JS for DataTables, jQuery, and Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../supplier/js/scripts.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!-- Custom JS for DataTable initialization -->
    <script src="../supplier/js/scripts.js"></script>
    <script src="../supplier/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#productsTable').DataTable();

            $('#productsTable_filter input').on('keyup', function() {
                var searchTerm = $(this).val();
                $.post('getSearchTerm.php', {
                    searchTerm: searchTerm
                });
            });

            // Handle the download button click event
            $('#downloadButton').on('click', function(e) {
                e.preventDefault();
                var searchTerm = table.search();
                $.post('getSearchTerm.php', {
                    searchTerm: searchTerm
                }, function() {
                    window.location.href = 'downloadProducts.php';
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>