<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | HMS</title>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="admin_dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="manage_doctors.php"><i class="fas fa-user-md"></i> Manage Doctors</a></li>
                <li><a href="manage_patients.php"><i class="fas fa-user-injured"></i> Manage Patients</a></li>
                <li><a href="prescriptions.php"><i class="fas fa-prescription"></i> Prescriptions</a></li>
                <li><a href="lab_tests.php"><i class="fas fa-vials"></i> Lab Tests</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <h1>Welcome, Admin</h1>
            <p>This is your dashboard.</p>

            <!-- Dashboard Overview -->
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <i class="fas fa-user-md"></i>
                    <h3>15 Doctors</h3>
                </div>

                <div class="dashboard-card">
                    <i class="fas fa-user-injured"></i>
                    <h3>50 Patients</h3>
                </div>

                <div class="dashboard-card">
                    <i class="fas fa-prescription"></i>
                    <h3>30 Prescriptions</h3>
                </div>

                <div class="dashboard-card">
                    <i class="fas fa-vials"></i>
                    <h3>20 Lab Tests</h3>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
