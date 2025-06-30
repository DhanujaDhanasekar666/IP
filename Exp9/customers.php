<?php
$conn = new mysqli("localhost", "root", "", "e_shop");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM customers");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registered Customers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background: linear-gradient(to right, #c9d6ff, #e2e2e2);
      font-family: 'Segoe UI', sans-serif;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #005792;
    }

    table {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 15px;
      text-align: center;
      font-size: 14px;
    }

    th {
      background-color: #005792;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #e6f7ff;
    }

    @media (max-width: 768px) {
      table, th, td {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>
  <h2>📋 All Customer Orders</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Product</th>
      <th>Delivery Date</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['product'] ?></td>
        <td><?= $row['delivery_date'] ?></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
