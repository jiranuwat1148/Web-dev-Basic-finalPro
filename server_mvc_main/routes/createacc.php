<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password  = $_POST['password'] ?? '';
    $Cpassword = $_POST['Cpassword'] ?? '';

    if ($password !== $Cpassword) {
        renderView('createacc', ['error' => 'รหัสผ่านไม่ตรงกัน']);
        exit;
    }
    
    $user = [
        'name'     => $_POST['Uname'] ?? '',
        'email'    => trim($_POST['email']) ?? '',
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'gender'    => $_POST['gender'] ?? '',
        'birthday'  => $_POST['birthday'] ?? ''
    ];

    if (!checkEmail($user['email'])) {
        insertUsers($user);
        header('Location: /login');   
        exit;
    } else {
        renderView('createacc', ['error' => 'อีเมลนี้ถูกใช้แล้ว']);
        exit;
    }

} else {
    renderView('createacc', ['error' => null]);
}