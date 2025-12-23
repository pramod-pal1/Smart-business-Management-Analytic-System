<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard | Smart Business Management</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
     <link rel="stylesheet" href="src/output.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 flex min-h-screen">

    <!--Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <header class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Welcome</h1>
            <span class="text-gray-600">Role: Employee</span>
        </header>

        <!--Overview Cards -->
        <section class="grid md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white shadow-md p-6 rounded-xl">
                <h3 class="text-sm text-gray-500">Your Purchases</h3>
                <p class="text-2xl font-bold text-blue-600 mt-2">15 Orders</p>
            </div>
            <div class="bg-white shadow-md p-6 rounded-xl">
                <h3 class="text-sm text-gray-500">Total Spent</h3>
                <p class="text-2xl font-bold text-blue-600 mt-2">₹3,00000</p>
            </div>
            <div class="bg-white shadow-md p-6 rounded-xl">
                <h3 class="text-sm text-gray-500">Last Purchase</h3>
                <p class="text-2xl font-bold text-blue-600 mt-2">2025-11-02</p>
            </div>
        </section>

        <!-- Chart -->
        <section class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Your Spending Trend</h2>
            <canvas id="spendingChart"></canvas>
        </section>
    </main>

    <!--Charts-->
    <script>
        const ctx = document.getElementById('spendingChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Amount Spent (₹)',
                    data: [18000, 30000, 35000, 20000, 45000, 55000],
                    backgroundColor: '#2563EB'
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });
    </script>
</body>

</html>