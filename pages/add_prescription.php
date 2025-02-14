<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Prescriptions</title>
    <link rel="stylesheet" href="../css/add_prescription.css">
</head>
<body>

<?php
include '../config/db_connect.php';  // Ensure this path is correct

// Add Prescription
if (isset($_POST['add_prescription'])) {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $medication = $_POST['medication'];
    $dosage = $_POST['dosage'];
    $date_prescribed = $_POST['date_prescribed'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO hms_prescription (patient_id, doctor_id, medication, dosage, date_prescribed, notes) 
            VALUES (:patient_id, :doctor_id, :medication, :dosage, :date_prescribed, :notes)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':patient_id' => $patient_id,
        ':doctor_id' => $doctor_id,
        ':medication' => $medication,
        ':dosage' => $dosage,
        ':date_prescribed' => $date_prescribed,
        ':notes' => $notes,
    ]);
    echo "<p style='color: green;'>Prescription added successfully!</p>";
}
?>

<h2>Manage Prescriptions</h2>
<form method="POST">
    <input type="number" name="patient_id" placeholder="Patient ID" required>
    <input type="number" name="doctor_id" placeholder="Doctor ID" required>
    <input type="text" name="medication" placeholder="Medication" required>
    <input type="text" name="dosage" placeholder="Dosage" required>
    <input type="date" name="date_prescribed" required>
    <textarea name="notes" placeholder="Additional Notes"></textarea>
    <button type="submit" name="add_prescription">Add Prescription</button>
</form>

<h2>Prescription List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Patient ID</th>
        <th>Doctor ID</th>
        <th>Medication</th>
        <th>Dosage</th>
        <th>Date Prescribed</th>
        <th>Notes</th>
    </tr>
    <?php
    $stmt = $conn->query("SELECT * FROM hms_prescription");
    $prescriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($prescriptions as $row) {
        echo "<tr>
            <td>{$row['prescription_id']}</td>
            <td>{$row['patient_id']}</td>
            <td>{$row['doctor_id']}</td>
            <td>{$row['medication']}</td>
            <td>{$row['dosage']}</td>
            <td>{$row['date_prescribed']}</td>
            <td>{$row['notes']}</td>
        </tr>";
    }
    ?>
</table>

</body>
</html>
