<?php
session_start();
require_once "../config/db_connect.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT * FROM hms_doctor WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($doctor && trim($doctor["password"]) == $password) {  // Use == for comparison
        // Set session variables
        $_SESSION["doctor_id"] = $doctor["doctor_id"];
        $_SESSION["doctor_name"] = $doctor["first_name"] . " " . $doctor["last_name"];
        $_SESSION["specialization"] = $doctor["specialization"];

        // Redirect to the Doctor's Portal
        header("Location: ../pages/doctors_portal.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password!'); window.location.href = '../pages/doctor_login.php';</script>";
        exit();
    }
}


