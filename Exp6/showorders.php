<?php
$conn = new mysqli("localhost", "root", "", "cake_shop");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order List</title>
  <style>
    body {
      background: #fef1f2;
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
      border: 1px solid #aaa;
      text-align: center;
    }
    th {
      background-color: #ff4081;
      color: white;
    }
    h2 {
      text-align: center;
    }
  </style>
</head>
<body>
  <h2>All Cake Orders</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Cake Type</th>
      <th>Quantity</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['customer_name'] ?></td>
      <td><?= $row['phone'] ?></td>
      <td><?= $row['cake_type'] ?></td>
      <td><?= $row['quantity'] ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
