<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manager Profile | Smart Business Management</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
   <link rel="stylesheet" href="src/output.css">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-gray-50 flex min-h-screen">

  <!--Main Content-->
  <main class="flex-1 p-8 overflow-y-auto">
    <header class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-gray-800">My Profile</h1>
      <span class="text-gray-600">Role: Manager</span>
    </header>

    <section class="bg-white p-8 rounded-xl shadow-md max-w-3xl mx-auto">
      <!--Profile Info-->
      <div class="flex flex-col items-center space-y-4 mb-8">
        <img src="https://cdn-icons-png.flaticon.com/512/219/219970.png" class="w-24 h-24 rounded-full border-4 border-blue-600">
        <h2 class="text-2xl font-semibold text-gray-800">Anjali Sharma</h2>
        <p class="text-gray-500">anjali@company.com</p>
      </div>

      <!--Profile Form-->
      <form class="space-y-5">
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
          <input type="text" value="Anjali Sharma"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Email</label>
          <input type="email" value="anjali@company.com"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Phone</label>
          <input type="text" value="9998765432"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-2">Address</label>
          <input type="text" value="Delhi, India"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Department</label>
            <input type="text" value="Sales & Operations" readonly
              class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2">
          </div>
          <div>
            <label class="block text-gray-700 font-semibold mb-2">Position</label>
            <input type="text" value="Senior Manager" readonly
              class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2">
          </div>
        </div>

        <div>
          <label class="block text-gray-700 font-semibold mb-2">Change Password</label>
          <input type="password" placeholder="Enter new password"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex justify-end mt-6 space-x-3">
          <button type="reset"
            class="border border-gray-400 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-100">Cancel</button>
          <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700">Update Profile</button>
        </div>
      </form>
    </section>
  </main>
</body>
</html>
