<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    echo "You must be logged in as a user to book a service.";
    exit();
}

$service = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];
$payment = $_POST['payment'];

// Connect to database (replace with your own details)
$conn = new mysqli('localhost', 'root', '', 'beauty_parlor');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Save booking to the database
$sql = "INSERT INTO bookings (service, date, time, payment_method) VALUES ('$service', '$date', '$time', '$payment')";

if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
