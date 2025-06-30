<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cake_shop";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Create database if not exists
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    phone VARCHAR(15),
    cake_type VARCHAR(100),
    quantity INT
)");

$name = $_POST['customer_name'];
$phone = $_POST['phone'];
$cake = $_POST['cake_type'];
$qty = $_POST['quantity'];

// Insert into DB
$stmt = $conn->prepare("INSERT INTO orders (customer_name, phone, cake_type, quantity) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $name, $phone, $cake, $qty);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect to view orders
header("Location: showorders.php");
exit();
?>
