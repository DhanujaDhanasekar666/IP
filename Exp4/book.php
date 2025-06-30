<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "train_system";

// Connect
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS reservations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  passenger_name VARCHAR(100),
  train_number VARCHAR(10),
  departure VARCHAR(100),
  destination VARCHAR(100),
  travel_date DATE
)");

$name = $_POST['passenger_name'];
$train = $_POST['train_number'];
$from = $_POST['departure'];
$to = $_POST['destination'];
$date = $_POST['travel_date'];

// Insert
$stmt = $conn->prepare("INSERT INTO reservations (passenger_name, train_number, departure, destination, travel_date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $train, $from, $to, $date);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect to show page
header("Location: showreservations.php");
exit();
?>
