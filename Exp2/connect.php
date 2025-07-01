<?php
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "connection1";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Result</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    body {
      height: 100vh;
      background: url('BACKGROUND.png') no-repeat center center;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .box {
      background-color: #1a1a2e, #3f0071;
      padding: 40px 50px;
      border-radius: 15px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
      text-align: center;
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: scale(0.95);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    .box h2 {
      color:  #ff4dd2;
      font-size: 24px;
      margin-bottom: 10px;
    }

    .box p {
      color:  #1a1a2e, #3f0071'
      font-size: 16px;
    }

    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 25px;
      background-color: #2a2a4d;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #ff4dd2;
    }
  </style>
</head>
<body>
  <div class="box">
    <?php
    if ($conn->connect_error) {
        echo "<h2 style='color: red;'>Connection Failed</h2>";
        echo "<p>" . $conn->connect_error . "</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO login1(firstname, username, password) VALUES (?, ?, ?)");
        if ($stmt === false) {
            echo "<h2 style='color: red;'>Error</h2>";
            echo "<p>Prepare failed: " . $conn->error . "</p>";
        } else {
            $stmt->bind_param("sss", $firstname, $username, $password);
            if ($stmt->execute()) {
                echo "<h2>🎉 You have successfully registered</h2>";
                echo "<p>Welcome, <strong>" . htmlspecialchars($firstname) . "</strong>!</p>";
            } else {
                echo "<h2 style='color: red;'>Failed</h2>";
                echo "<p>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        }
        $conn->close();
    }
    ?>
    <a href="display.php" class="btn">View All Users</a>
  </div>
</body>
</html>
