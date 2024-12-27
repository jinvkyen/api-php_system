<?php
session_start();

if (isset($_POST['searchTerm'])) {
    $_SESSION['searchTerm'] = $_POST['searchTerm'];
}