<?php
$conn = new mysqli("localhost", "root", "", "train_system");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM reservations");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Train Reservations</title>
  <style>
    body {
      background: #f2f2ff;
      font-family: Arial;
      padding: 20px;
    }
    table {
      width: 80%;
      margin: auto;
      border-collapse: collapse;
    }
    th, td {
      padding: 12px;
      border: 1px solid #aaa;
      text-align: center;
    }
    th {
      background-color: #28a745;
      color: white;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <h2>All Train Reservations</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Passenger</th>
      <th>Train No</th>
      <th>From</th>
      <th>To</th>
      <th>Date</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['passenger_name'] ?></td>
      <td><?= $row['train_number'] ?></td>
      <td><?= $row['departure'] ?></td>
      <td><?= $row['destination'] ?></td>
      <td><?= $row['travel_date'] ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
