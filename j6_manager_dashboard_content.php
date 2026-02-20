<?php
require_once "auth_check.php";
require_role([2]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manager Dashboard | Smart Business Management</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
   <link rel="stylesheet" href="src/output.css">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-gray-50 flex min-h-screen">

  <!-- Main Content -->
  <main class="flex-1 p-8 overflow-y-auto">
    <header class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Welcome, Manager</h1>
      <span class="text-gray-600">Role: Manager</span>
    </header>

    <!--Cards -->
    <section class="grid md:grid-cols-3 gap-6 mb-10">
      <div class="bg-white shadow-md p-6 rounded-xl">
        <h3 class="text-sm text-gray-500">Total Sales (This Month)</h3>
        <p class="text-2xl font-bold text-blue-600 mt-2">₹750000</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-xl">
        <h3 class="text-sm text-gray-500">Products in Stock</h3>
        <p class="text-2xl font-bold text-blue-600 mt-2">198</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-xl">
        <h3 class="text-sm text-gray-500">Active Customers</h3>
        <p class="text-2xl font-bold text-blue-600 mt-2">112</p>
      </div>
    </section>

    <!-- Charts -->
    <section class="grid md:grid-cols-2 gap-8">
      <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Monthly Sales Overview</h2>
        <canvas id="salesChart"></canvas>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Stock Distribution</h2>
        <canvas id="stockChart"></canvas>
      </div>
    </section>
  </main>

  <script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Sales (₹)',
          data: [100000, 130000, 180000, 200000, 230000, 250000],
          borderColor: '#2563EB',
          fill: true,
          backgroundColor: 'rgba(37,99,235,0.2)',
          tension: 0.4
        }]
      },
      options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });

    // Stock Chart
    const stockCtx = document.getElementById('stockChart').getContext('2d');
    new Chart(stockCtx, {
      type: 'doughnut',
      data: {
        labels: ['Electronics', 'Clothing', 'Accessories'],
        datasets: [{
          data: [60, 25, 15],
          backgroundColor: ['#2563EB', '#22C55E', '#F59E0B']
        }]
      },
      options: { responsive: true }
    });
  </script>

</body>
</html>
