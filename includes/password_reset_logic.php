<?php
require_once __DIR__ . "/../connection/connect.php";

function sendResetLink($email) {
    global $link;

    $email = trim($email);
    if ($email === '') {
        return '';
    }

    $token = bin2hex(random_bytes(32));
    $expires = date("Y-m-d H:i:s", strtotime("+15 minutes"));

    $stmt = mysqli_prepare(
        $link,
        "INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "sss", $email, $token, $expires);
    mysqli_stmt_execute($stmt);

    return "reset_password.php?token=$token";
}

function verifyToken($token) {
    global $link;

    $stmt = mysqli_prepare(
        $link,
        "SELECT email, token, expires_at FROM password_resets WHERE token = ? AND expires_at > NOW() LIMIT 1"
    );
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($res);
}

function updatePassword($email, $password) {
    global $link;

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare(
        $link,
        "UPDATE users SET password = ? WHERE email = ?"
    );
    mysqli_stmt_bind_param($stmt, "ss", $hash, $email);
    mysqli_stmt_execute($stmt);

    // Invalidate all reset tokens for this email after password change.
    $cleanupStmt = mysqli_prepare($link, "DELETE FROM password_resets WHERE email = ?");
    mysqli_stmt_bind_param($cleanupStmt, "s", $email);
    mysqli_stmt_execute($cleanupStmt);
}

