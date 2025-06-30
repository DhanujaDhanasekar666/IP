<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "hospital_db";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100),
    phone VARCHAR(15),
    department VARCHAR(100),
    appointment_date DATE
)");

$name = $_POST['patient_name'];
$phone = $_POST['phone'];
$dept = $_POST['department'];
$date = $_POST['appointment_date'];

$stmt = $conn->prepare("INSERT INTO appointments (patient_name, phone, department, appointment_date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $phone, $dept, $date);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect to show appointments
header("Location: showappointments.php");
exit();
?>
