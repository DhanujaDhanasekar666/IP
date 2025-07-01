<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "connection1";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Fetch records
$sql = "SELECT id, firstname, username, password FROM login1";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Registered Users</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(120deg,  #1a1a2e, #3f0071);

      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      background: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 800px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px 16px;
      text-align: center;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color:   #ff4dd2;
      color: white;
    }

    tr:hover {
      background-color:   #3a0ca3;
    }

    .back-btn {
      display: inline-block;
      margin-top: 25px;
      text-decoration: none;
      padding: 10px 20px;
      background-color:  #ff4dd2;
      color: white;
      border-radius: 6px;
    }

    .back-btn:hover {
      background-color:   #3a0ca3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📋 All Registered Users</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Username</th>
                  <th>Password</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["id"]) . "</td>
                    <td>" . htmlspecialchars($row["firstname"]) . "</td>
                    <td>" . htmlspecialchars($row["username"]) . "</td>
                    <td>" . htmlspecialchars($row["password"]) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>No users found.</p>";
    }
    $conn->close();
    ?>

    <div style="text-align:center;">
      <a class="back-btn" href="index.html">🔙 Back to Registration</a>
    </div>
  </div>
</body>
</html>
