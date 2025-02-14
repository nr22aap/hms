<?php
session_start();
require_once "../config/db_connect.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    echo "Username: $username <br>";
    echo "Password: $password <br>";

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT * FROM hms_admin WHERE user_name = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Fetched User: ";
    print_r($admin);

    if (!$admin) {
        echo "<script>alert('Invalid username!'); window.location.href = '../pages/admin_login.php';</script>";
        exit();
    }

    // Check if the password matches
    if ($admin["password"] === $password) {
        $_SESSION["admin"] = $admin["user_name"];
        echo "<script>alert('Login successful! Redirecting...'); window.location.href = '../pages/admin_dashboard.php';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid password!'); window.location.href = '../pages/admin_login.php';</script>";
        exit();
    }
}
?>
