<?php
// Database configuration
$host = '127.0.0.1'; // Replace with your actual database host
$username = 'root'; // Replace with your actual database username
$password = 'your_database_password'; // Replace with your actual database password
$database = 'your_database_name'; // Replace with your actual database name

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
