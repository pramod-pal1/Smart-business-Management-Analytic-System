<?php
require_once "auth_check.php";
require_role([1, 2]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products & Inventory | Smart Business Management</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
   <link rel="stylesheet" href="src/output.css">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-gray-50 flex min-h-screen">

  <!--Main Content -->
  <main class="flex-1 p-8 overflow-y-auto">
    <header class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Product & Inventory Management</h1>
      <button id="addProductBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700">+ Add Product</button>
    </header>

    <!--Product Form-->
    <div id="productForm" class="hidden bg-white shadow-md rounded-xl p-6 mb-8">
      <h2 class="text-xl font-semibold text-blue-600 mb-4">Add / Update Product</h2>
      <form id="form" class="grid md:grid-cols-2 gap-6">
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Product Name</label>
          <input type="text" id="productName" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Category</label>
          <input type="text" id="category" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Price ($)</label>
          <input type="number" id="price" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Stock Quantity</label>
          <input type="number" id="stock" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="md:col-span-2 flex justify-end space-x-3 mt-4">
          <button type="reset" id="cancelBtn" class="border border-gray-400 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100">Cancel</button>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save Product</button>
        </div>
      </form>
    </div>

    <!--Product Table -->
    <section class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">Product List</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="py-3 px-4 text-left">#</th>
              <th class="py-3 px-4 text-left">Product Name</th>
              <th class="py-3 px-4 text-left">Category</th>
              <th class="py-3 px-4 text-left">Price ($)</th>
              <th class="py-3 px-4 text-left">Stock</th>
              <th class="py-3 px-4 text-center">Action</th>
            </tr>
          </thead>
          <tbody id="productTable" class="text-gray-700">
            <tr class="border-t">
              <td class="py-3 px-4">1</td>
              <td class="py-3 px-4">Laptop</td>
              <td class="py-3 px-4">Electronics</td>
              <td class="py-3 px-4">$800</td>
              <td class="py-3 px-4">25</td>
              <td class="py-3 px-4 text-center space-x-2">
                <button class="text-blue-600 hover:underline">Edit</button>
                <button class="text-red-600 hover:underline">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <script>
    const formContainer = document.getElementById('productForm');
    const addBtn = document.getElementById('addProductBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const form = document.getElementById('form');

    addBtn.addEventListener('click', () => {
      formContainer.classList.toggle('hidden');
    });
    cancelBtn.addEventListener('click', () => {
      formContainer.classList.add('hidden');
    });

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.getElementById('productName').value;
      const category = document.getElementById('category').value;
      const price = document.getElementById('price').value;
      const stock = document.getElementById('stock').value;

      const table = document.getElementById('productTable');
      const rowCount = table.rows.length + 1;

      const newRow = `<tr class="border-t">
        <td class="py-3 px-4">${rowCount}</td>
        <td class="py-3 px-4">${name}</td>
        <td class="py-3 px-4">${category}</td>
        <td class="py-3 px-4">$${price}</td>
        <td class="py-3 px-4">${stock}</td>
        <td class="py-3 px-4 text-center space-x-2">
          <button class="text-blue-600 hover:underline">Edit</button>
          <button class="text-red-600 hover:underline">Delete</button>
        </td>
      </tr>`;
      table.insertAdjacentHTML('beforeend', newRow);

      form.reset();
      formContainer.classList.add('hidden');
    });
  </script>

</body>
</html>
