<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // เรียกฟังก์ชันที่คืนค่าเป็น student_id (int) หรือ false
    $student_id = checkLogin($username, $password);

    if ($student_id !== false) {
        $_SESSION['timestamp'] = time();
        $_SESSION['user_id'] = $student_id; // เก็บ ID ลง Session
        header('Location: /courses'); // ล็อกอินแล้วไปหน้าเลือกวิชา
        exit;
    } else {
        renderView('login', ['error' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง']);
    }
} else {
    renderView('login');
}