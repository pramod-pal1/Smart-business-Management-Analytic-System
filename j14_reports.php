<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reports & Analytics | Smart Business Management</title>
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
      <h1 class="text-3xl font-bold text-gray-800">Reports & Analytics</h1>
      <button id="exportBtn" class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700">⬇ Export Report</button>
    </header>

    <!-- Summary Cards -->
    <section class="grid md:grid-cols-4 gap-6 mb-10">
      <div class="bg-white shadow-md p-6 rounded-xl">
        <h3 class="text-sm text-gray-500">Total Sales</h3>
        <p class="text-2xl font-bold text-blue-600 mt-2">₹21,00000</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-xl">
        <h3 class="text-sm text-gray-500">Total Products</h3>
        <p class="text-2xl font-bold text-blue-600 mt-2">250</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-xl">
        <h3 class="text-sm text-gray-500">Total Customers</h3>
        <p class="text-2xl font-bold text-blue-600 mt-2">198</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-xl">
        <h3 class="text-sm text-gray-500">Monthly Profit</h3>
        <p class="text-2xl font-bold text-green-600 mt-2">₹7,00000</p>
      </div>
    </section>

    <!-- Charts-->
    <section class="grid md:grid-cols-2 gap-8 mb-8">
      <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Sales Overview (Monthly)</h2>
        <canvas id="salesChart"></canvas>
      </div>

      <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Top Selling Products</h2>
        <canvas id="topProductChart"></canvas>
      </div>
    </section>

    <!-- Recent Transactions Table -->
    <section class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Transactions</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="py-3 px-4 text-left">#</th>
              <th class="py-3 px-4 text-left">Customer</th>
              <th class="py-3 px-4 text-left">Product</th>
              <th class="py-3 px-4 text-left">Amount (₹)</th>
              <th class="py-3 px-4 text-left">Date</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <tr class="border-t">
              <td class="py-3 px-4">1</td>
              <td class="py-3 px-4">Ravi Kumar</td>
              <td class="py-3 px-4">Laptop</td>
              <td class="py-3 px-4">₹1,00000</td>
              <td class="py-3 px-4">2025-11-09</td>
            </tr>
            <tr class="border-t">
              <td class="py-3 px-4">2</td>
              <td class="py-3 px-4">Anjali Sharma</td>
              <td class="py-3 px-4">Smartphone</td>
              <td class="py-3 px-4">₹55000</td>
              <td class="py-3 px-4">2025-11-07</td>
            </tr>
            <tr class="border-t">
              <td class="py-3 px-4">3</td>
              <td class="py-3 px-4">Mohit Jain</td>
              <td class="py-3 px-4">Headphones</td>
              <td class="py-3 px-4">₹11000</td>
              <td class="py-3 px-4">2025-11-06</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        datasets: [{
          label: 'Sales (₹)',
          data: [100000, 150000, 200000, 250000, 300000, 350000, 400000, 450000, 500000, 550000],
          backgroundColor: '#2563EB'
        }]
      },
      options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });

    // Top Product Chart
    const topProductCtx = document.getElementById('topProductChart').getContext('2d');
    new Chart(topProductCtx, {
      type: 'pie',
      data: {
        labels: ['Laptop', 'Smartphone', 'Headphones', 'Tablet'],
        datasets: [{
          data: [35, 30, 20, 15],
          backgroundColor: ['#2563EB', '#22C55E', '#F59E0B', '#EF4444']
        }]
      },
      options: { responsive: true }
    });

    // Export Report (Dummy)
    document.getElementById('exportBtn').addEventListener('click', () => {
      alert('Report exported successfully! (Backend export logic will be added later)');
    });
  </script>

</body>
</html>
