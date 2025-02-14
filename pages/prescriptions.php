<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Prescriptions</title>
    <link rel="stylesheet" href="../css/prescription.css">
</head>
<body>

<h2>Prescription List</h2>

<table border="1">
    <tr>
        <th>Prescription ID</th>
        <th>Patient ID</th>
        <th>Doctor ID</th>
        <th>Medication</th>
        <th>Dosage</th>
        <th>Date Prescribed</th>
        <th>Notes</th>
    </tr>
    <?php
    include '../config/db_connect.php';  // Ensure this path is correct

    $stmt = $conn->query("SELECT * FROM hms_prescription");
    $prescriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($prescriptions) {
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
    } else {
        echo "<tr><td colspan='7'>No prescriptions found.</td></tr>";
    }
    ?>
</table>

</body>
</html>

