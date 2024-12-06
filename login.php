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
