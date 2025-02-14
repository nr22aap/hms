<?php
include '../config/db_connect.php'; // Correct path to db_connect.php

if (isset($conn) && $conn) {
    echo "Database connection is successful!";
} else {
    echo "Database connection failed: " . mysqli_connect_error();
}
?>
