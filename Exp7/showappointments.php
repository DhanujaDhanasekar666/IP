<?php
$conn = new mysqli("localhost", "root", "", "beauty_parlor");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Appointments List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #fbc2eb, #a6c1ee);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
    }

    h2 {
      text-align: center;
      color: #6a0572;
      padding-top: 20px;
      font-size: 32px;
    }

    table {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
      background: white;
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 15px;
      text-align: center;
      font-size: 15px;
    }

    th {
      background: #6a0572;
      color: white;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f9eaff;
    }

    tr:hover {
      background-color: #ffe4f3;
      transition: 0.3s ease;
    }

    @media (max-width: 768px) {
      table, th, td {
        font-size: 12px;
        padding: 10px;
      }

      h2 {
        font-size: 24px;
      }
    }
  </style>
</head>
<body>
  <h2>🌸 All Beauty Parlor Appointments</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Service</th>
      <th>Date</th>
      <th>Time</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['service'] ?></td>
        <td><?= $row['appointment_date'] ?></td>
        <td><?= $row['appointment_time'] ?></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
