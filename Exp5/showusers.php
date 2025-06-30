<?php
$conn = new mysqli("localhost", "root", "", "flight_booking");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM reservations");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registered Passengers</title>
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
      border: 1px solid #333;
      text-align: center;
    }
    th {
      background-color: #007bff;
      color: white;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <h2>List of Booked Flights</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Destination</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['phone'] ?></td>
      <td><?= $row['destination'] ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
