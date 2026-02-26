<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['email']) ?? '';
    $password = $_POST['password'] ?? '';

    if (checkLogin($username, $password)) {
        $unix_timestamp = time();
        $_SESSION['timestamp'] = $unix_timestamp;
        $_SESSION['email'] = $username;
        $_SESSION['user_id'] = $userId;
        header('Location: /home');
        exit;
    } else {
        renderView('login', ['error' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง']);
    }
} else {
    renderView('login');
}