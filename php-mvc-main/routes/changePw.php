<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_password = $_POST['oldPw'] ?? '';
    $password = $_POST['NewPw'] ?? '';
    $confirm_password = $_POST['ConfirmNewPw'] ?? '';
    $user = getUsersByEmail($_SESSION['email']);
    if (password_verify($old_password,$user['password'])) {
        if ($password !== $confirm_password) {
            renderView('changePw', ['message' => 'รหัสผ่านใหม่ไม่ตรงกัน']);
            exit;
        }
        if (password_verify($password,$user['password'])) {
            renderView('changePw', ['message' => 'รหัสผ่านนี้ยังถูกใช้งานอยู่']);
            exit;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $res = updateUserPassword($user['user_id'], $hashed_password);
        if ($res > 0) {
            header('Location: /Account-detail');
            exit;
        } else {
            renderView('changePw', ['message' => 'Something went wrong! on update password']);
            exit;
        }
    }
    else{
        renderView('changePw', ['message' => 'รหัสผ่านเก่าไม่ตรงกัน']);
    }
} else {
    renderView('changePw');
}
