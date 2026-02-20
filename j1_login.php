<?php
session_start();
require_once "connection/connect.php";

$error = "";

if (isset($_POST['login'])) {
    $email = trim($_POST['username'] ?? "");
    $password = $_POST['password'] ?? "";

    $stmt = mysqli_prepare($link, "SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role_id'] = $row['role_id'];

            if ((int) $row['role_id'] === 1) {
                header("Location: j3_admin_dashboard.php");
            } elseif ((int) $row['role_id'] === 2) {
                header("Location: j5_manager_dashboard.php");
            } else {
                header("Location: j7_user_dashboard.php");
            }
            exit;
        }
    }

    $error = "Invalid email or password.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Smart Business Management</title>
  <link rel="stylesheet" href="src/output.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Login</h2>
    <p class="text-center text-gray-500 mb-8">Sign in to your account to access your dashboard</p>

    <?php if ($error !== ""): ?>
      <p class="mb-4 text-sm text-red-600 text-center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="" method="POST" class="space-y-5">
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Email</label>
        <input type="email" name="username" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2">Password</label>
        <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="flex items-center justify-end">
        <a href="forgot_password.php" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
      </div>

      <button type="submit" name="login" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">Login</button>
    </form>

    <p class="text-center text-gray-600 mt-6">
      Don't have an account?
      <a href="j2_register.php" class="text-blue-600 font-semibold hover:underline">Create one</a>
    </p>

    <div class="text-center mt-8">
      <a href="index.php" class="text-sm text-gray-500 hover:text-blue-600">&larr; Back to Home</a>
    </div>
  </div>
</body>
</html>

