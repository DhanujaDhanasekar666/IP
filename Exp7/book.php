<?php
$conn = new mysqli("localhost", "root", "", "beauty_parlor");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS appointments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20),
  service VARCHAR(100),
  appointment_date DATE,
  appointment_time TIME
)");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];

$stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, service, appointment_date, appointment_time) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $service, $appointment_date, $appointment_time);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect to show page
header("Location: showappointments.php");
exit();
?>
