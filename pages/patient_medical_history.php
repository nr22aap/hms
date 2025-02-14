<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Patient Medical History</title>
    <link rel="stylesheet" href="../css/patient_history.css">
</head>
<body>

<?php
include '../config/db_connect.php';  // Ensure this path is correct

// Add Medical History
if (isset($_POST['add_medical_history'])) {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $treatment = $_POST['treatment'];
    $diagnosis = $_POST['diagnosis'];
    $prescription = $_POST['prescription'];
    $record_date = $_POST['record_date'];

    $sql = "INSERT INTO hms_medical_records (patient_id, doctor_id, treatment, diagnosis, prescription, record_date) 
            VALUES (:patient_id, :doctor_id, :treatment, :diagnosis, :prescription, :record_date)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':patient_id' => $patient_id,
        ':doctor_id' => $doctor_id,
        ':treatment' => $treatment,
        ':diagnosis' => $diagnosis,
        ':prescription' => $prescription,
        ':record_date' => $record_date,
    ]);
    echo "<p style='color: green;'>Medical history added successfully!</p>";
}
?>

<h2>Manage Patient Medical History</h2>
<form method="POST">
    <input type="number" name="patient_id" placeholder="Patient ID" required>
    <input type="number" name="doctor_id" placeholder="Doctor ID" required>
    <input type="text" name="treatment" placeholder="Treatment" required>
    <input type="text" name="diagnosis" placeholder="Diagnosis" required>
    <input type="text" name="prescription" placeholder="Prescription" required>
    <input type="date" name="record_date" required>
    <button type="submit" name="add_medical_history">Add Medical History</button>
</form>

<h2>Patient Medical History</h2>
<table border="1">
    <tr>
        <th>Record ID</th>
        <th>Patient ID</th>
        <th>Doctor ID</th>
        <th>Treatment</th>
        <th>Diagnosis</th>
        <th>Prescription</th>
        <th>Record Date</th>
    </tr>
    <?php
    $stmt = $conn->query("SELECT * FROM hms_medical_records");
    $medical_records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($medical_records as $row) {
        echo "<tr>
            <td>{$row['record_id']}</td>
            <td>{$row['patient_id']}</td>
            <td>{$row['doctor_id']}</td>
            <td>{$row['treatment']}</td>
            <td>{$row['diagnosis']}</td>
            <td>{$row['prescription']}</td>
            <td>{$row['record_date']}</td>
        </tr>";
    }
    ?>
</table>

</body>
</html>
