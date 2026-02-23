<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password  = $_POST['password'] ?? '';
    $Cpassword = $_POST['Cpassword'] ?? '';

    if ($password !== $Cpassword) {
        renderView('createAcc', ['error' => 'รหัสผ่านไม่ตรงกัน']);
        exit;
    }
    
    $user = [
        'name'     => $_POST['Uname'] ?? '',
        'email'    => trim($_POST['email']) ?? '',
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];

    if (!checkEmail($user['email'])) {
        insertUsers($user);
        header('Location: /login');   
        exit;
    } else {
        renderView('createAcc', ['error' => 'อีเมลนี้ถูกใช้แล้ว']);
        exit;
    }

} else {
    renderView('createAcc', ['error' => null]);
}
