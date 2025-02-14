<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Portal</title>

    <!-- Main CSS -->
    <link rel="stylesheet" href="/fyp_hms/css/style.css">
    <link rel="stylesheet" href="/fyp_hms/css/doctors_portal.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="portal-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2><i class="fas fa-user-md"></i> Doctor's Portal</h2>
            <ul>
                <li><a href="/fyp_hms/pages/my_calendar.php "><i class="fas fa-user-md"></i>My Calendar </a></li>
                <li><a href="/fyp_hms/pages/patient_medical_history.php"><i class="fas fa-file-prescription"></i> Patient Medical History</a></li>
                <li><a href="/fyp_hms/pages/patient_lab_test.php"><i class="fas fa-flask"></i> Patient Lab Test</a></li>
                <li><a href="/fyp_hms/pages/add_prescription.php"><i class="fas fa-vials"></i> Add Prescription</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header>
                <h1>Welcome to the Doctor's Portal</h1>
            </header>

            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <i class="fas fa-user-injured"></i>
                    <h3>Patients</h3>
                </div>
                <div class="dashboard-card">
                    <i class="fas fa-pills"></i>
                    <h3>Prescriptions</h3>
                </div>
                <div class="dashboard-card">
                    <i class="fas fa-flask"></i>
                    <h3>Lab Tests</h3>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
