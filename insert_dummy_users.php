<?php
require_once "connection/connect.php";

$users = [
    ['admin1', 'admin@gmail.com', 'admin123', 'admin'],
    ['manager1', 'manager@gmail.com', 'manager123', 'manager'],
    ['user1', 'user@gmail.com', 'user123', 'user']
];

foreach ($users as $u) {
    $username = $u[0];
    $email    = $u[1];
    $password = password_hash($u[2], PASSWORD_DEFAULT);
    $role     = $u[3];

    mysqli_query($link,
        "INSERT INTO users (username, email, password, role)
         VALUES ('$username', '$email', '$password', '$role')"
    );
}

echo "✅ Dummy users inserted successfully";
?>
