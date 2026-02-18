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
        'email'    => $_POST['email'] ?? '',
        'password' => $password,
    ];
    header('Location: /home');   
    exit;

} else {
    renderView('createAcc', ['error' => null]);
}
