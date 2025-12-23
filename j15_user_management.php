<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Management | SBMAS</title>
<!-- <script src="https://cdn.tailwindcss.com"></script> -->
 <link rel="stylesheet" href="src/output.css">


<style>
    body { font-family: 'Poppins', sans-serif; }
    .hidden { display: none; }
</style>

<script>
function editRow(id) {
    document.getElementById("view_" + id).classList.add("hidden");
    document.getElementById("edit_" + id).classList.remove("hidden");
}

function cancelEdit(id) {
    document.getElementById("edit_" + id).classList.add("hidden");
    document.getElementById("view_" + id).classList.remove("hidden");
}
</script>
</head>

<body class="bg-gray-100 p-10">

<h1 class="text-3xl font-bold text-blue-700 text-center mb-8">
    User Management (Admin)
</h1>

<div class="bg-white p-6 rounded-xl shadow-xl overflow-x-auto">

    <table class="w-full border border-gray-300">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="py-3 px-4">ID</th>
                <th class="py-3 px-4">Name</th>
                <th class="py-3 px-4">Email</th>
                <th class="py-3 px-4">City</th>
                <th class="py-3 px-4">Role</th>
                <th class="py-3 px-4">Department</th>
                <th class="py-3 px-4">Position</th>
                <th class="py-3 px-4 text-center">Action</th>
            </tr>
        </thead>

        <tbody>

        <tr id="view_1" class="border-t">
            <td class="py-3 px-4">1</td>
            <td class="py-3 px-4">John Doe</td>
            <td class="py-3 px-4">john@example.com</td>
            <td class="py-3 px-4">Mumbai</td>
            <td class="py-3 px-4">Admin</td>
            <td class="py-3 px-4">Management</td>
            <td class="py-3 px-4">Manager</td>

            <td class="py-3 px-4 text-center">
                <button onclick="editRow(1)"
                    class="text-blue-600 font-semibold mr-3 hover:underline">Edit</button>

                <button class="text-red-600 font-semibold hover:underline">
                    Delete
                </button>
            </td>
        </tr>

        <tr id="edit_1" class="border-t hidden bg-gray-50">
            <td class="py-3 px-4">1</td>

            <td class="py-3 px-4">
                <input type="text" value="John Doe"
                    class="border rounded px-2 py-1 w-full">
            </td>

            <td class="py-3 px-4">
                <input type="email" value="john@example.com"
                    class="border rounded px-2 py-1 w-full">
            </td>

            <td class="py-3 px-4">
                <select class="border rounded px-2 py-1">
                    <option>Mumbai</option>
                    <option>Thane</option>
                    <option>Andheri</option>
                    <option>Bandra</option>
                </select>
            </td>

            <td class="py-3 px-4">
                <select class="border rounded px-2 py-1">
                    <option>Admin</option>
                    <option>Manager</option>
                    <option>User</option>
                </select>
            </td>

            <td class="py-3 px-4">
                <select class="border rounded px-2 py-1">
                    <option>Management</option>
                    <option>Sales</option>
                    <option>IT</option>
                </select>
            </td>

            <td class="py-3 px-4">
                <select class="border rounded px-2 py-1">
                    <option>Manager</option>
                    <option>Executive</option>
                    <option>Staff</option>
                </select>
            </td>

            <td class="py-3 px-4 text-center">
                <button class="text-green-600 font-semibold mr-3 hover:underline">
                    Save
                </button>

                <button onclick="cancelEdit(1)"
                    class="text-gray-600 font-semibold hover:underline">
                    Cancel
                </button>
            </td>
        </tr>

        </tbody>
    </table>
</div>

</body>
</html>
