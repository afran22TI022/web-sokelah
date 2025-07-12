<?php
session_start();
include 'admin/koneksi.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Login gagal! Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #2c3e50, #4ca1af);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-box {
      background-color: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 400px;
    }

    .login-box h2 {
      margin-bottom: 30px;
      font-weight: bold;
      text-align: center;
      color: #2c3e50;
    }

    .form-control:focus {
      border-color: #4ca1af;
      box-shadow: 0 0 0 0.2rem rgba(76, 161, 175, 0.25);
    }

    .btn-primary {
      background-color: #4ca1af;
      border: none;
    }

    .btn-primary:hover {
      background-color: #3b8897;
    }

    .alert {
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="login-box my-5">
  <h2>Login Admin</h2>

  <?php if (!empty($error)): ?>
    <div class="alert alert-danger">
      <?= $error ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="d-grid">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </form>
</div>

</body>
</html>