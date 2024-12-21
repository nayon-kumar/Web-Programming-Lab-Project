<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spicy Restaurant Login</title>
  <link rel="stylesheet" href="loginStyle.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Login</h2>
      <form action="#" method="POST">
        <div class="input-group">
          <label for="username">Email or Username</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
      </form>
      <p>Don't have accout? <a href="register.php">Register</a></p>
      <p>Or go to <a href="index.php">Home</a></p>
    </div>
  </div>
</body>
</html>

<?php

$conn = new mysqli('localhost', 'root', '', 'spicy_restaurant');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "<script>
                    alert('Login successful!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Invalid password.');
                    window.location.href = 'login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('User not found.');
                window.location.href = 'login.php';
              </script>";
    }
}

$conn->close();
?>
