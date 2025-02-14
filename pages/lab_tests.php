<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Lab Tests</title>
    <link rel="stylesheet" href="../css/lab_tests.css">
</head>
<body>

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
    include '../config/db_connect.php';  // Ensure this path is correct

    $stmt = $conn->query("SELECT * FROM hms_lab_test");
    $lab_tests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($lab_tests) {
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
    } else {
        echo "<tr><td colspan='6'>No lab tests found.</td></tr>";
    }
    ?>
</table>

</body>
</html>
