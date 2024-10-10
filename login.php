<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Simple user data for demonstration
$users = [
    'user' => ['username' => 'user', 'password' => 'user123', 'role' => 'user'],
    'admin' => ['username' => 'admin', 'password' => 'admin123', 'role' => 'admin']
];

// Validate user
if ($users[$role]['username'] === $username && $users[$role]['password'] === $password) {
    $_SESSION['role'] = $role;
    header("Location: dashboard.html"); // Redirect to the dashboard
    exit();
} else {
    echo "Invalid login credentials.";
}
?>
