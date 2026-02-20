<?php
require_once "connection/connect.php";

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $password = $_POST['password'] ?? "";
    $confirmPassword = $_POST['confirm_password'] ?? "";
    $city = trim($_POST['city'] ?? "");
    $phone = trim($_POST['phone'] ?? "");
    $roleId = 3; // Public registration creates normal user accounts only.

    if ($name === "" || $email === "" || $password === "" || $city === "") {
        $error = "Please fill all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } elseif ($password !== $confirmPassword) {
        $error = "Password and confirm password do not match.";
    } else {
        $checkStmt = mysqli_prepare($link, "SELECT id FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($checkStmt, "s", $email);
        mysqli_stmt_execute($checkStmt);
        $existsResult = mysqli_stmt_get_result($checkStmt);

        if (mysqli_num_rows($existsResult) > 0) {
            $error = "This email is already registered.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $insertStmt = mysqli_prepare(
                $link,
                "INSERT INTO users (name, email, phone, address, password, role_id) VALUES (?, ?, ?, ?, ?, ?)"
            );
            mysqli_stmt_bind_param($insertStmt, "sssssi", $name, $email, $phone, $city, $hash, $roleId);

            if (mysqli_stmt_execute($insertStmt)) {
                $success = "Registration successful. You can login now.";
            } else {
                $error = "Unable to create account. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Smart Business Management</title>
  <link rel="stylesheet" href="src/output.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Create Account</h2>
    <p class="text-center text-gray-500 mb-8">Register to access your business dashboard</p>

    <?php if ($error !== ""): ?>
      <p class="mb-4 text-sm text-red-600 text-center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <?php if ($success !== ""): ?>
      <p class="mb-4 text-sm text-green-600 text-center"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form action="j2_register.php" method="POST" class="space-y-5">
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
        <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2">Email Address</label>
        <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2">Password</label>
        <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
        <input type="password" name="confirm_password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2">Account Type</label>
        <input type="text" value="User" readonly class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2">City</label>
        <select name="city" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
          <option value="">-- Choose City --</option>
          <option value="Mumbai">Mumbai</option>
          <option value="Thane">Thane</option>
          <option value="Borivali">Borivali</option>
          <option value="Vasai">Vasai</option>
          <option value="Virar">Virar</option>
          <option value="Mira Road">Mira Road</option>
          <option value="Andheri">Andheri</option>
          <option value="Bandra">Bandra</option>
          <option value="Kurla">Kurla</option>
        </select>
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
        <input type="text" name="phone" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
        Create Account
      </button>
    </form>

    <p class="text-center text-gray-600 mt-6">
      Already have an account?
      <a href="j1_login.php" class="text-blue-600 hover:underline font-semibold">Login</a>
    </p>

    <div class="text-center mt-8">
      <a href="index.php" class="text-sm text-gray-500 hover:text-blue-600">&larr; Back to Home</a>
    </div>
  </div>
</body>
</html>

