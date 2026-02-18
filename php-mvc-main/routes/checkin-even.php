<?php

// ตรวจสอบ Login
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}

$status = null; // สถานะเริ่มต้น

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. รับค่า OTP ที่กรอกมา (ไม่ใช่ค่าจากปุ่ม subcheck)
    $otpInput = strtoupper(trim($_POST['otp_code'] ?? ''));

    // 2. ตรวจสอบรหัส (Mock Data: สมมติว่ารหัสที่ถูกคือ 123456)
    // ในระบบจริงคุณต้อง query Database ตรงนี้
    if ($otpInput === '123456') {
        $status = 'success'; // รหัสถูกต้อง
    } else {
        $status = 'error';   // รหัสผิด
    }
}

// ส่งตัวแปร $status ไปให้หน้าเว็บตรวจสอบเพื่อแสดง Alert
renderView('checkin', [
    'status' => $status
]);