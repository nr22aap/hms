<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Lab Tests</title>
    <link rel="stylesheet" href="../css/patient_lab_test.css">
</head>
<body>

<?php
include '../config/db_connect.php';  // Ensure this path is correct

// Add Lab Test
if (isset($_POST['add_lab_test'])) {
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $test_name = $_POST['test_name'];
    $test_date = $_POST['test_date'];
    $result = $_POST['result'];

    $sql = "INSERT INTO hms_lab_test (patient_id, doctor_id, test_name, test_date, result) 
            VALUES (:patient_id, :doctor_id, :test_name, :test_date, :result)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':patient_id' => $patient_id,
        ':doctor_id' => $doctor_id,
        ':test_name' => $test_name,
        ':test_date' => $test_date,
        ':result' => $result,
    ]);
    echo "<p style='color: green;'>Lab test added successfully!</p>";
}
?>

<h2>Manage Lab Tests</h2>
<form method="POST">
    <input type="number" name="patient_id" placeholder="Patient ID" required>
    <input type="number" name="doctor_id" placeholder="Doctor ID" required>
    <input type="text" name="test_name" placeholder="Test Name" required>
    <input type="date" name="test_date" required>
    <select name="result" required>
        <option value="Pending">Pending</option>
        <option value="Normal">Normal</option>
        <option value="Abnormal">Abnormal</option>
    </select>
    <button type="submit" name="add_lab_test">Add Lab Test</button>
</form>

<h2>Lab Test Results</h2>
<table border="1">
    <tr>
        <th>Test ID</th>
        <th>Patient ID</th>
        <th>Doctor ID</th>
        <th>Test Name</th>
        <th>Test Date</th>
        <th>Result</th>
    </tr>
    <?php
    $stmt = $conn->query("SELECT * FROM hms_lab_test");
    $lab_tests = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($lab_tests as $row) {
        echo "<tr>
            <td>{$row['test_id']}</td>
            <td>{$row['patient_id']}</td>
            <td>{$row['doctor_id']}</td>
            <td>{$row['test_name']}</td>
            <td>{$row['test_date']}</td>
            <td>{$row['result']}</td>
        </tr>";
    }
    ?>
</table>

</body>
</html>
