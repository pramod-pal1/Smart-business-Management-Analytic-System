<?php
require_once "includes/password_reset_logic.php";

$token = $_GET['token'] ?? '';
$token = trim($token);
$data = verifyToken($token);
$error = "";
$success = "";

if (!$data) {
    $error = "Invalid or expired token.";
}

if ($data && isset($_POST['reset'])) {
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } elseif ($password !== $confirmPassword) {
        $error = "Password and confirm password do not match.";
    } else {
        updatePassword($data['email'], $password);
        $success = "Password reset successful. You can login now.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="src/output.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Reset Password</h2>

    <?php if ($error !== ""): ?>
      <p class="mb-4 text-sm text-red-600 text-center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($success !== ""): ?>
      <p class="mb-4 text-sm text-green-600 text-center"><?= htmlspecialchars($success) ?></p>
      <p class="text-center"><a class="text-blue-600 underline" href="j1_login.php">Go to login</a></p>
    <?php elseif ($data): ?>
      <form method="POST" class="space-y-5">
        <div>
          <input type="password" name="password" placeholder="New password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <input type="password" name="confirm_password" placeholder="Confirm password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button name="reset" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">Reset Password</button>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>

