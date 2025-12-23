<?php
require_once __DIR__ . "/../connection/connect.php";



function sendResetLink($email) {
    global $link;

    $token = bin2hex(random_bytes(32));
    $expires = date("Y-m-d H:i:s", strtotime("+15 minutes"));

    mysqli_query($link, "
        INSERT INTO password_resets (email, token, expires_at)
        VALUES ('$email', '$token', '$expires')
    ");

    return "reset_password.php?token=$token";
}


function verifyToken($token) {
    global $link;

    $res = mysqli_query($link, "
        SELECT * FROM password_resets
        WHERE token='$token' AND expires_at > NOW()
    ");

    return mysqli_fetch_assoc($res);
}


function updatePassword($email, $password) {
    global $link;

    $hash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($link, "
        UPDATE users SET password='$hash'
        WHERE email='$email'
    ");
}
