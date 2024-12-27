<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "dbRetailer";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn){
    die("Failed to connect to the Database.");
} else {
    // echo "Established connection.";
}