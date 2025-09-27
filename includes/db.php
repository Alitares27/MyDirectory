<?php
// Database connection parameters
$host = "localhost";
$user = "root";
$password = "";
$database = "directory";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("<p style='color:red; text-align:center;'>Connection failed: " . $conn->connect_error . "</p>");
}
?>