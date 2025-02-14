<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Patients</title>

    <!-- Link to the CSS File -->
    <link rel="stylesheet" href="../css/manage_patients.css">
</head>
<body>

<?php
include '../config/db_connect.php';  // Ensure this path is correct

// Add Patient
if (isset($_POST['add_patient'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $gender = $_POST['gender'];
    $doctor_id = $_POST['doctor_id'];

    $sql = "INSERT INTO hms_patient (first_name, last_name, dob, email, contact_number, gender, doctor_id) 
            VALUES (:first_name, :last_name, :dob, :email, :contact_number, :gender, :doctor_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':dob' => $dob,
        ':email' => $email,
        ':contact_number' => $contact_number,
        ':gender' => $gender,
        ':doctor_id' => $doctor_id,
    ]);
    echo "<p style='color: green;'>Patient added successfully!</p>";
}

// Remove Patient
if (isset($_GET['delete_patient'])) {
    $patient_id = $_GET['delete_patient'];
    $stmt = $conn->prepare("DELETE FROM hms_patient WHERE patient_id = :patient_id");
    $stmt->execute([':patient_id' => $patient_id]);
}
?>

<h2>Manage Patients</h2>
<form method="POST">
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="date" name="dob" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="contact_number" placeholder="Contact Number" required>
    <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <input type="number" name="doctor_id" placeholder="Assigned Doctor ID" required>
    <button type="submit" name="add_patient">Add Patient</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Gender</th>
        <th>Doctor ID</th>
        <th>Action</th>
    </tr>
    <?php
    $stmt = $conn->query("SELECT * FROM hms_patient");
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($patients as $row) {
        echo "<tr>
            <td>{$row['patient_id']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['dob']}</td>
            <td>{$row['email']}</td>
            <td>{$row['contact_number']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['doctor_id']}</td>
            <td><a href='?delete_patient={$row['patient_id']}'>Delete</a></td>
        </tr>";
    }
    ?>
</table>

</body>
</html>
