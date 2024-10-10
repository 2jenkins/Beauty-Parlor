<?php
session_start();
include 'db_connect.php';  // Include the database connection

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Prepare a statement to check the user's credentials
$stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND role = :role LIMIT 1");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':role', $role);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verify the user's password (assuming it's hashed)
if ($user && md5($password) === $user['password']) {
    // Set session variables
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // Redirect the user to the appropriate dashboard
    if ($user['role'] == 'user') {
        header("Location: dashboard.php");  // User dashboard
    } elseif ($user['role'] == 'admin') {
        header("Location: admin_dashboard.php");  // Admin dashboard
    }
    exit();
} else {
    echo "Invalid login credentials.";
}
?>

