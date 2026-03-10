<?php
require_once DATABASES_DIR . '/otp.php';

// 1. รับค่า event_id จากการกดปุ่ม (ถ้าไม่มีให้เด้งกลับไปหน้ากิจกรรม)
$eventId = $_POST['event_id'] ?? null;

if (!$eventId) {
    header('Location: /event_content');
    exit;
}

$user = getUsersByEmail($_SESSION['email']); 
$userId = $user['user_id']; 

// 2. สร้างรหัส OTP ตามวิชามาร (ฝัง User ID)
$newOtp = generateOtp($userId);
$expireTime = getExpireTime();

$getconn = getConnection();

// 3. บันทึกรหัสลงตาราง otps โดยใช้ $eventId ที่รับมาจริง
$insertOtpSql = "INSERT INTO otps (otp_id, event_id, expired) VALUES ('$newOtp', $eventId, '$expireTime')";
$getconn->query($insertOtpSql);

renderView('generate_otp',[
    'title' => 'รหัสเข้างานสำหรับกิจกรรม ID: ' . $eventId,
    'otp_code' => $newOtp,
    'expires_at' => $expireTime
]);