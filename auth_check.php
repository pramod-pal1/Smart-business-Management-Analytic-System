<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: j1_login.php");
    exit;
}

function require_role($allowed_roles = []) {
    if (!in_array($_SESSION['role_id'], $allowed_roles)) {
        echo "<h1>Access Denied</h1>";
        exit;
    }
}
