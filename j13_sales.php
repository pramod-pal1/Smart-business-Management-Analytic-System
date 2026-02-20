<?php
require_once "auth_check.php";
require_role([1, 2]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sales Management | Smart Business Management</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
   <link rel="stylesheet" href="src/output.css">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-gray-50 flex min-h-screen">

  <!-- Main Content -->
  <main class="flex-1 p-8 overflow-y-auto">
    <header class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Sales Management</h1>
      <button id="addSaleBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700">+ Record Sale</button>
    </header>

    <!-- Sales Form-->
    <div id="saleForm" class="hidden bg-white shadow-md rounded-xl p-6 mb-8">
      <h2 class="text-xl font-semibold text-blue-600 mb-4">Record a New Sale</h2>
      <form id="form" class="grid md:grid-cols-2 gap-6">
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Customer Name</label>
          <input type="text" id="customerName" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Product Name</label>
          <input type="text" id="productName" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Quantity</label>
          <input type="number" id="quantity" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Price per Unit ($)</label>
          <input type="number" id="price" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="md:col-span-2 flex justify-end space-x-3 mt-4">
          <button type="reset" id="cancelBtn" class="border border-gray-400 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100">Cancel</button>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save Sale</button>
        </div>
      </form>
    </div>

    <section class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">Sales Records</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="py-3 px-4 text-left">#</th>
              <th class="py-3 px-4 text-left">Customer</th>
              <th class="py-3 px-4 text-left">Product</th>
              <th class="py-3 px-4 text-left">Quantity</th>
              <th class="py-3 px-4 text-left">Total ($)</th>
              <th class="py-3 px-4 text-left">Date</th>
              <th class="py-3 px-4 text-center">Invoice</th>
            </tr>
          </thead>
          <tbody id="salesTable" class="text-gray-700">
            <tr class="border-t">
              <td class="py-3 px-4">1</td>
              <td class="py-3 px-4">John Doe</td>
              <td class="py-3 px-4">Laptop</td>
              <td class="py-3 px-4">2</td>
              <td class="py-3 px-4">$1600</td>
              <td class="py-3 px-4">2025-11-09</td>
              <td class="py-3 px-4 text-center">
                <button class="text-blue-600 hover:underline">Generate Invoice</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <script>
    const saleForm = document.getElementById('saleForm');
    const addBtn = document.getElementById('addSaleBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const form = document.getElementById('form');

    addBtn.addEventListener('click', () => saleForm.classList.toggle('hidden'));
    cancelBtn.addEventListener('click', () => saleForm.classList.add('hidden'));

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const customer = document.getElementById('customerName').value;
      const product = document.getElementById('productName').value;
      const quantity = document.getElementById('quantity').value;
      const price = document.getElementById('price').value;
      const total = quantity * price;
      const date = new Date().toISOString().split('T')[0];

      const table = document.getElementById('salesTable');
      const rowCount = table.rows.length + 1;

      const newRow = `<tr class="border-t">
        <td class="py-3 px-4">${rowCount}</td>
        <td class="py-3 px-4">${customer}</td>
        <td class="py-3 px-4">${product}</td>
        <td class="py-3 px-4">${quantity}</td>
        <td class="py-3 px-4">$${total}</td>
        <td class="py-3 px-4">${date}</td>
        <td class="py-3 px-4 text-center">
          <button class="text-blue-600 hover:underline">Generate Invoice</button>
        </td>
      </tr>`;
      table.insertAdjacentHTML('beforeend', newRow);

      form.reset();
      saleForm.classList.add('hidden');
    });
  </script>

</body>
</html>
