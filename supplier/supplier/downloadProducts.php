<?php
session_start();
require "../supplier/connection/database.conn.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!$conn) {
        die("Failed to connect to the server" . mysqli_connect_error());
    } else {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="products.csv"');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('idproducts', 'prod_image', 'name', 'description', 'quantity', 'currency', 'category', 'prod_condition', 'status', 'price'));

        $searchTerm = isset($_SESSION['searchTerm']) ? $_SESSION['searchTerm'] : '';
        $searchTermWithWildcard = "%" . $searchTerm . "%";

        $query = "SELECT * FROM products WHERE 
            prod_image LIKE ?
            OR name LIKE ?
            OR description LIKE ?
            OR quantity LIKE ?
            OR category LIKE ?
            OR prod_condition LIKE ?
            OR status LIKE ?
            OR price LIKE ?
            OR currency LIKE ?
            ORDER BY idproducts ASC";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssssssss', $searchTermWithWildcard, $searchTermWithWildcard, $searchTermWithWildcard, $searchTermWithWildcard, $searchTermWithWildcard, $searchTermWithWildcard, $searchTermWithWildcard, $searchTermWithWildcard, $searchTermWithWildcard);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                fputcsv($output, $row);
            }
        } else {
            fputcsv($output, array('No products found'));
        }
        fclose($output);
    }
    mysqli_close($conn);
}
