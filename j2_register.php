<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Smart Business Management</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
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

    <!-- REGISTER FORM -->
    <form action="j2_register.php" method="POST" class="space-y-5">

      <!-- FULL NAME -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
        <input type="text" name="name" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- EMAIL -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Email Address</label>
        <input type="email" name="email" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- PASSWORD -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Password</label>
        <input type="password" name="password" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- CONFIRM PASSWORD -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
        <input type="password" name="confirm_password" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- ROLE SELECTION (Admin = 1, Manager = 2, User = 3) -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Select Role</label>
        <select name="role_id" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
          <option value="">-- Select Role --</option>
          <option value="1">Admin</option>
          <option value="2">Manager</option>
          <option value="3">User</option>
        </select>
      </div>

      <!-- CITY SELECTION (Instead of Address) -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Select City</label>
        <select name="city" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
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
        <input type="text" name="phone"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
        Create Account
      </button>
    </form>

    <p class="text-center text-gray-600 mt-6">
      Already have an account?
      <a href="j1_login.php" class="text-blue-600 hover:underline font-semibold">Login</a>
    </p>

    <div class="text-center mt-8">
      <a href="index.php" class="text-sm text-gray-500 hover:text-blue-600">← Back to Home</a>
    </div>
  </div>

</body>
</html>
