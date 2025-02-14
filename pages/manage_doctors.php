<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors</title>
    
    <!-- Link to the CSS File -->
    <link rel="stylesheet" href="../css/manage_doctors.css">
</head>
<body>

<?php
include '../config/db_connect.php';  // Ensure this path is correct

// Add Doctor
if (isset($_POST['add_doctor'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $joining_date = $_POST['joining_date'];
    $working_status = $_POST['working_status'];

    $sql = "INSERT INTO hms_doctor (first_name, last_name, dob, specialization, email, contact_number, joining_date, working_status) 
            VALUES (:first_name, :last_name, :dob, :specialization, :email, :contact_number, :joining_date, :working_status)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':dob' => $dob,
        ':specialization' => $specialization,
        ':email' => $email,
        ':contact_number' => $contact_number,
        ':joining_date' => $joining_date,
        ':working_status' => $working_status,
    ]);
    echo "<p style='color: green;'>Doctor added successfully!</p>";
}

// Remove Doctor
if (isset($_GET['delete_doctor'])) {
    $doctor_id = $_GET['delete_doctor'];
    $stmt = $conn->prepare("DELETE FROM hms_doctor WHERE doctor_id = :doctor_id");
    $stmt->execute([':doctor_id' => $doctor_id]);
}
?>

<h2>Manage Doctors</h2>
<form method="POST">
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="date" class="dob-field" name="dob" required>
    <input type="text" name="specialization" placeholder="Specialization" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="contact_number" placeholder="Contact Number" required>
    <input type="date" class="joining-field" name="joining_date" required>
    <select name="working_status">
        <option value="Working">Working</option>
        <option value="Not Working">Not Working</option>
    </select>
    <button type="submit" name="add_doctor">Add Doctor</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Specialization</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Joining Date</th>
        <th>Working Status</th>
        <th>Action</th>
    </tr>
    <?php
    $stmt = $conn->query("SELECT * FROM hms_doctor");
    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($doctors as $row) {
        echo "<tr>
            <td>{$row['doctor_id']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['dob']}</td>
            <td>{$row['specialization']}</td>
            <td>{$row['email']}</td>
            <td>{$row['contact_number']}</td>
            <td>{$row['joining_date']}</td>
            <td>{$row['working_status']}</td>
            <td><a href='?delete_doctor={$row['doctor_id']}'>Delete</a></td>
        </tr>";
    }
    ?>
</table>

</body>
</html>

