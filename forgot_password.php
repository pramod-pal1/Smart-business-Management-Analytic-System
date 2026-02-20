<?php
require_once "includes/password_reset_logic.php";

$resetLink = "";   // yahan link store hoga

if (isset($_POST['submit'])) {
    $resetLink = sendResetLink($_POST['email'] ?? '');
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

    <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">
      Forgot Password
    </h2>

    <!-- Form -->
    <form method="POST" class="space-y-5">
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Email</label>
        <input 
          type="email" 
          name="email" 
          required 
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
      </div>

      <button 
        name="submit" 
        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
        Send Reset Link
      </button>
    </form>

    <!-- ✅ RESET LINK (FORM KE NICHE) -->
    <?php if ($resetLink): ?>
      <div class="mt-6 p-4 bg-gray-100 rounded-lg break-words">
        <p class="text-sm font-semibold text-gray-700 mb-2">
          Reset link (testing):
        </p>

        <a 
          href="<?= htmlspecialchars($resetLink) ?>" 
          class="text-blue-600 text-sm underline break-all"
        >
          <?= htmlspecialchars($resetLink) ?>
        </a>

        <p class="text-xs text-gray-500 mt-2">
          Copy and open this link in browser
        </p>
      </div>
    <?php endif; ?>

  </div>

</body>
</html>
