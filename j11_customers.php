<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customer Management | Smart Business Management</title>
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
      <h1 class="text-3xl font-bold text-gray-800">Customer Management</h1>
      <button id="addCustomerBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700">+ Add Customer</button>
    </header>

    <!--Customer Form-->
    <div id="customerForm" class="hidden bg-white shadow-md rounded-xl p-6 mb-8">
      <h2 class="text-xl font-semibold text-blue-600 mb-4">Add / Update Customer</h2>
      <form id="form" class="grid md:grid-cols-2 gap-6">
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
          <input type="text" id="name" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Email</label>
          <input type="email" id="email" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Phone</label>
          <input type="text" id="phone" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Address</label>
          <input type="text" id="address" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="md:col-span-2 flex justify-end space-x-3 mt-4">
          <button type="reset" id="cancelBtn" class="border border-gray-400 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100">Cancel</button>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Save Customer</button>
        </div>
      </form>
    </div>

    <!-- Customer Table -->
    <section class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">Customer List</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
          <thead class="bg-blue-600 text-white">
            <tr>
              <th class="py-3 px-4 text-left">#</th>
              <th class="py-3 px-4 text-left">Name</th>
              <th class="py-3 px-4 text-left">Email</th>
              <th class="py-3 px-4 text-left">Phone</th>
              <th class="py-3 px-4 text-left">Address</th>
              <th class="py-3 px-4 text-center">Action</th>
            </tr>
          </thead>
          <tbody id="customerTable" class="text-gray-700">
            <tr class="border-t">
              <td class="py-3 px-4">1</td>
              <td class="py-3 px-4">Ravi Kumar</td>
              <td class="py-3 px-4">ravi@example.com</td>
              <td class="py-3 px-4">9876543210</td>
              <td class="py-3 px-4">Delhi, India</td>
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
    const customerForm = document.getElementById('customerForm');
    const addBtn = document.getElementById('addCustomerBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const form = document.getElementById('form');

    addBtn.addEventListener('click', () => customerForm.classList.toggle('hidden'));
    cancelBtn.addEventListener('click', () => customerForm.classList.add('hidden'));

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const phone = document.getElementById('phone').value;
      const address = document.getElementById('address').value;

      const table = document.getElementById('customerTable');
      const rowCount = table.rows.length + 1;

      const newRow = `<tr class="border-t">
        <td class="py-3 px-4">${rowCount}</td>
        <td class="py-3 px-4">${name}</td>
        <td class="py-3 px-4">${email}</td>
        <td class="py-3 px-4">${phone}</td>
        <td class="py-3 px-4">${address}</td>
        <td class="py-3 px-4 text-center space-x-2">
          <button class="text-blue-600 hover:underline">Edit</button>
          <button class="text-red-600 hover:underline">Delete</button>
        </td>
      </tr>`;
      table.insertAdjacentHTML('beforeend', newRow);

      form.reset();
      customerForm.classList.add('hidden');
    });
  </script>

</body>
</html>
