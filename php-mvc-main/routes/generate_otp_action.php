<?php
// ไฟล์นี้ไม่ต้องมี session_start() ซ้ำ เพราะ index.php ทำไว้ให้แล้ว
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../databases/otp.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'] ?? 1; // ดึง ID ผู้ใช้
    $eventId = $_POST['event_id'] ?? null;

    if ($eventId) {
        $otp = generateOTP($userId, (int)$eventId); 
        if ($otp) {
            echo $otp; // ส่งเลข 6 หลักกลับไปหา JavaScript
            exit;
        }
    }
    echo "error";
    exit;
}