<?php
$servername = "localhost";  // or your server IP
$username = "u617409277_root";         // your MySQL username
$password = "Shourav@123456";             // your MySQL password
$database = "u617409277_color_game"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
