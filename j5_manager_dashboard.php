<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: j1_login.php");
    exit;
}
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

  <!--Sidebar -->
  <aside class="w-64 bg-blue-700 text-white flex flex-col p-6 space-y-6 fixed left-0 top-0 h-full">
    <h2 class="text-2xl font-bold">Manager Panel</h2>
    <nav class="flex flex-col space-y-3">
      <a href="j6_manager_dashboard_content.php" target="contentFrame" class="bg-blue-600 px-4 py-2 rounded-lg font-semibold">Dashboard</a>
      <a href="j12_products.php" target="contentFrame" class="hover:bg-blue-600 px-4 py-2 rounded-lg">Manage Products</a>
      <a href="j13_sales.php" target="contentFrame" class="hover:bg-blue-600 px-4 py-2 rounded-lg">Manage Sales</a>
      <a href="j14_reports.php" target="contentFrame" class="hover:bg-blue-600 px-4 py-2 rounded-lg">Reports</a>
      <a href="j9_manager_profile.php" target="contentFrame" class="hover:bg-blue-600 px-4 py-2 rounded-lg">Profile</a>
    </nav>
    <div class="mt-auto">
      <a href="logout.php" class="text-sm bg-white text-blue-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100">Logout</a>
    </div>
  </aside>

  <!--Main Content-->
  <main class="flex-1 p-8 ml-64 overflow-y-auto">

    <!--load other pages-->
    <iframe name="contentFrame" src="j6_manager_dashboard_content.php" class="w-full h-[90vh] rounded-xl bg-white shadow-md border"></iframe>

  </main>

</body>
</html>
