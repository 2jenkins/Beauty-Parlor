<?php
include 'db_connect.php';  // Database connection

// Insert sample users
$conn->exec("INSERT INTO users (username, password, role) VALUES 
            ('admin', MD5('admin123'), 'admin'),
            ('user1', MD5('user123'), 'user'),
            ('user2', MD5('user456'), 'user')");

// Insert sample bookings
$conn->exec("INSERT INTO bookings (user_id, service, booking_date, booking_time, payment_method) VALUES
            (2, 'Haircut', '2024-10-10', '14:00:00', 'mpesa'),
            (3, 'Massage', '2024-10-11', '15:30:00', 'bank_card'),
            (2, 'Manicure', '2024-10-12', '11:00:00', 'cash')");

echo "Test data inserted successfully!";
?>
