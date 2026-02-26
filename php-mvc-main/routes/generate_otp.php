<?php
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../databases/events.php'; 

// 1. รับ ID จาก URL (เช่น /generate_otp?id=1)
$id = $_GET['id'] ?? 1; 
// 2. ดึงข้อมูลงาน
$event = getEventById((int)$id);
// 3. ส่งข้อมูลไปที่ View
if ($event) {
    renderView('generate_otp', [
        'eventId'   => $event['event_id'],
        'eventName' => $event['title'] 
    ]);
} else {
    die("ไม่พบข้อมูลกิจกรรม ID: " . htmlspecialchars((string)$id));
}