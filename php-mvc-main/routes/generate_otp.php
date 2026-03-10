<?php
require_once DATABASES_DIR . '/otp.php';

$eventId = $_POST['event_id'] ?? null;

if (!$eventId) {
    header('Location: /event_content');
    exit;
}

$user = getUsersByEmail($_SESSION['email']); 
$userId = $user['user_id']; 


$newOtp = generateOtp($userId);
$expireTime = getExpireTime();

$getconn = getConnection();

$insertOtpSql = "INSERT INTO otps (otp_id, event_id, expired) VALUES ('$newOtp', $eventId, '$expireTime')";
$getconn->query($insertOtpSql);

renderView('generate_otp',[
    'title' => 'รหัสเข้างานสำหรับกิจกรรม ID: ' . $eventId,
    'otp_code' => $newOtp,
    'expires_at' => $expireTime
]);
