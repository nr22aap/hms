<?php
$host = 'localhost';
$db = 'hms_database'; // Updated database name
$user = 'root'; // Default XAMPP username
$pass = '';     // Default XAMPP password (blank)

try {
    // Establish a connection to the database
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Database connected successfully!";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

