<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spicy Restaurant Register</title>
  <link rel="stylesheet" href="loginStyle.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Register</h2>
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
      <p>Already have accout? <a href="login.php">Login</a></p>
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

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Registration successful!');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: Unable to register. Username might already be taken.');
                window.location.href = 'register.php';
              </script>";
    }
}

$conn->close();
?>
