<?php
// Database connection file (db_connect.php)

$host = 'localhost';  // Your database host (often 'localhost')
$dbname = 'beauty_parlor';  // The name of your database
$user = 'root';  // Database username
$pass = '';  // Database password (leave empty if no password for local DB)

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle the connection error
    die("Connection failed: " . $e->getMessage());
}
?>
