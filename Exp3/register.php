<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO login3 (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')";
    mysqli_query($conn, $sql);
    echo "Registered successfully. <a href='login.php'>Login now</a>";
}
?>

<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
<h2>User Registration</h2>
<form method="POST">
    Username: <input type="text" name="username" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>
</body>
</html>
