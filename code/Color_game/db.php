<?php
$host = '127.0.0.1'; // Database host (usually 127.0.0.1 or localhost)
$port = '3306';      // Database port (usually 3306)
$dbname = 'u263904278_color_game'; // Replace with your database name
$username = 'u263904278_root'; // Replace with your database username
$password = 'Shourav@123456'; // Replace with your database password
try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database connection successful!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}