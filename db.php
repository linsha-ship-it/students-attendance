<?php
// Database credentials
$host = 'localhost'; // Change if your database is not on localhost
$user = 'root';      // MySQL username
$password = '';      // MySQL password (for default XAMPP, it's an empty string)
$dbname = 'attendance_system'; // Your database name

// Create a new MySQLi connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    // If the connection fails, print the error message and stop the script
    die("Connection failed: " . $conn->connect_error);
}
?>
