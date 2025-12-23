<?php
require_once "includes/password_reset_logic.php";

$token = $_GET['token'] ?? '';
$data = verifyToken($token);

if (!$data) {
    die("Invalid or expired token");
}

if (isset($_POST['reset'])) {
    updatePassword($data['email'], $_POST['password']);
    echo "Password reset successful. <a href='j1_login.php'>Login</a>";
    exit;
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

    <!-- Form -->
    <form method="POST" class="space-y-5">
      <div>
        <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

        <button name="reset" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">Reset Password</button>
    </form>

  </div>

</body>
</html>
