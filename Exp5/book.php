<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "flight_booking";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Create DB if not exists
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(15),
    destination VARCHAR(100)
)");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$destination = $_POST['destination'];

$stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, destination) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $destination);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect
header("Location: showusers.php");
exit();
?>
