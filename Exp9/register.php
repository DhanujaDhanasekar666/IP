<?php
$conn = new mysqli("localhost", "root", "", "e_shop");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE TABLE IF NOT EXISTS customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20),
  product VARCHAR(100),
  delivery_date DATE
)");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$product = $_POST['product'];
$delivery_date = $_POST['delivery_date'];

$stmt = $conn->prepare("INSERT INTO customers (name, email, phone, product, delivery_date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $product, $delivery_date);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: customers.php");
exit();
?>
