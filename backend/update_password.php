<?php
include '../config/db_connect.php';

try {
    $hashedPassword = password_hash('123', PASSWORD_DEFAULT); // Hash the plain text password

    $stmt = $conn->prepare("UPDATE hms_user SET password = :hashedPassword WHERE user_name = :username");
    $stmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    $username = 'doctor_1'; // Update for the specific user

    if ($stmt->execute()) {
        echo "Password hashed and updated successfully!";
    } else {
        echo "Failed to update password!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
