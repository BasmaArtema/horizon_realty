<?php
// Shared database connection file.
// Update these credentials when deploying to a different host or MySQL account.
$host = "localhost";
$username = "abouart_horizon_realty";
$password = "UDPKuK2uf3ZP97W2qXxS";
$database = "abouart_horizon_realty";

// Create one reusable mysqli connection for the rest of the PHP pages.
$conn = new mysqli($host, $username, $password, $database);

// utf8mb4 supports full Unicode safely across user and listing content.
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
