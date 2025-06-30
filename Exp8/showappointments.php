<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Appointments</title>
  <style>
    body {
      background: #f0faff;
      font-family: Arial;
      padding: 20px;
    }
    table {
      border-collapse: collapse;
      width: 80%;
      margin: auto;
    }
    th, td {
      padding: 12px;
      border: 1px solid #999;
      text-align: center;
    }
    th {
      background-color: #007bff;
      color: white;
    }
    h2 {
      text-align: center;
    }
  </style>
</head>
<body>
  <h2>Registered Appointments</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Patient Name</th>
      <th>Phone</th>
      <th>Department</th>
      <th>Date</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['patient_name'] ?></td>
      <td><?= $row['phone'] ?></td>
      <td><?= $row['department'] ?></td>
      <td><?= $row['appointment_date'] ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
