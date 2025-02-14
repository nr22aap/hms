<?php
require_once "../config/db_connect.php";

// Fetch the working schedule for all doctors
$stmt = $conn->prepare("SELECT d.first_name, d.last_name, s.work_day, s.shift_start, s.shift_end 
                        FROM doctor_schedule s 
                        JOIN hms_doctor d ON s.doctor_id = d.doctor_id 
                        ORDER BY s.work_day, s.shift_start");
$stmt->execute();
$schedule = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Calendar</title>
    <link rel="stylesheet" href="../css/My_calendar.css">
</head>
<body>
    <h2>Doctor's Working Schedule</h2>
    <table>
        <tr>
            <th>Doctor Name</th>
            <th>Work Day</th>
            <th>Shift Start</th>
            <th>Shift End</th>
        </tr>
        <?php if (count($schedule) > 0): ?>
            <?php foreach ($schedule as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['first_name'] . " " . $row['last_name']) ?></td>
                    <td><?= htmlspecialchars($row['work_day']) ?></td>
                    <td><?= htmlspecialchars($row['shift_start']) ?></td>
                    <td><?= htmlspecialchars($row['shift_end']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No schedule available</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
