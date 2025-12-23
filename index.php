<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Business Management & Analytics System</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <link rel="stylesheet" href="src/output.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-800">

  <!--Navbar -->
  <header class="bg-white shadow-md fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-600">SmartBiz360</h1>
      <nav class="space-x-6 hidden md:block">
        <a href="#" class="hover:text-blue-600">Home</a>
        <a href="#features" class="hover:text-blue-600">Features</a>
        <a href="#about" class="hover:text-blue-600">About</a>
        <a href="j1_login.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Login</a>
        <a href="j2_register.php" class="border border-blue-600 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white">Sign Up</a>
      </nav>
      <button class="md:hidden text-blue-600" id="menu-btn">☰</button>
    </div>
  </header>

  <!--Hero Section -->
  <section class="pt-28 pb-16 bg-linear-to-r from-blue-600 to-blue-400 text-white">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center px-6">
      <div class="md:w-1/2 space-y-6">
        <h2 class="text-4xl md:text-5xl font-bold leading-tight">Manage Your Business Smartly with Real-Time Analytics</h2>
        <p class="text-lg">A complete digital solution for sales, inventory, and customer management — built using Laravel, PHP, and MySQL.</p>
        <div class="space-x-4">
          <a href="j1_login.php" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100">Login</a>
          <a href="j2_register.php" class="border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600">Create Account</a>
        </div>
      </div>
      <div class="md:w-1/2 mt-10 md:mt-0">
        <img src="./asset/dashbord.png" alt="Dashboard Preview" class="rounded-xl shadow-lg">
      </div>
    </div>
  </section>

  <!--Features Section -->
  <section id="features" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <h3 class="text-3xl font-bold text-blue-600 mb-10">System Features & Benefits</h3>
      <div class="grid md:grid-cols-4 gap-8">
        <div class="p-6 shadow-md rounded-xl hover:shadow-lg transition">
          <div class="text-4xl mb-3">📦</div>
          <h4 class="font-semibold text-xl mb-2">Product & Inventory</h4>
          <p>Manage products with real-time stock tracking and updates.</p>
        </div>
        <div class="p-6 shadow-md rounded-xl hover:shadow-lg transition">
          <div class="text-4xl mb-3">💰</div>
          <h4 class="font-semibold text-xl mb-2">Sales Management</h4>
          <p>Record orders, generate invoices, and analyze sales trends.</p>
        </div>
        <div class="p-6 shadow-md rounded-xl hover:shadow-lg transition">
          <div class="text-4xl mb-3">👥</div>
          <h4 class="font-semibold text-xl mb-2">Customer Management</h4>
          <p>Store customer profiles and track purchase history efficiently.</p>
        </div>
        <div class="p-6 shadow-md rounded-xl hover:shadow-lg transition">
          <div class="text-4xl mb-3">📊</div>
          <h4 class="font-semibold text-xl mb-2">Analytics Dashboard</h4>
          <p>Visualize revenue, stock status, and performance insights.</p>
        </div>
      </div>
    </div>
  </section>

  <!--About Section -->
  <section id="about" class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h3 class="text-3xl font-bold text-blue-600 mb-6">About the System</h3>
      <p class="text-lg leading-relaxed text-gray-700 max-w-3xl mx-auto">
        The Smart Business Management & Analytics System is a full-stack web platform that helps SMEs manage daily operations efficiently with automation and analytics. It provides real-time dashboards for better business decisions and faster growth.
      </p>
    </div>
  </section>


  <section class="py-16 bg-blue-600 text-white text-center">
    <h3 class="text-3xl font-bold mb-6">Start managing your business smartly today!</h3>
    <div class="space-x-4">
      <a href="j1_login.php" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Login</a>
      <a href="j2_register.php" class="border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600">Create Account</a>
    </div>
  </section>

  <!--Footer -->
  <footer class="bg-gray-900 text-gray-300 text-center py-6">
    <p>© 2025 Smart Business Management & Analytics System. All Rights Reserved.</p>
  </footer>

  <!--Toggle Script -->
  <script>
    const menuBtn = document.getElementById('menu-btn');
    const nav = document.querySelector('nav');
    menuBtn.addEventListener('click', () => {
      nav.classList.toggle('hidden');
    });
  </script>

</body>
</html>
