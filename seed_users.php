<?php
require_once "connection/connect.php";

$users = [
    ["Admin User", "admin@sbmas.com", "9999999999", "Head Office", "admin123", 1],
    ["Manager User", "manager@sbmas.com", "8888888888", "Branch Office", "manager123", 2],
    ["Employee User", "employee@sbmas.com", "7777777777", "Store Room", "user123", 3],
];

$stmt = mysqli_prepare(
    $link,
    "INSERT INTO users (name, email, phone, address, password, role_id)
     VALUES (?, ?, ?, ?, ?, ?)"
);

foreach ($users as $u) {
    $hash = password_hash($u[4], PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssssi", $u[0], $u[1], $u[2], $u[3], $hash, $u[5]);
    mysqli_stmt_execute($stmt);
}

echo "Users inserted successfully";
