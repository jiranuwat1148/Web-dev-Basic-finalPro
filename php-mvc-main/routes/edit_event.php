<?php
// ไฟล์: routes/edit_event.php

// รับค่า ID จาก POST เท่านั้นเพื่อรักษาความสะอาดของ URL
$eventId = (int)($_POST['event_id'] ?? 0);
$user = getUsersByEmail($_SESSION['email']);
$userId = $user['user_id'];

// ตรวจสอบว่าเป็นการกดปุ่ม "บันทึกการแก้ไข" หรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_update'])) {
    $data = [
        'title'       => $_POST['title'],
        'description' => $_POST['description'],
        'attribute'   => $_POST['attribute'],
        'location'    => $_POST['location'],
        'start_date'  => $_POST['start_date'],
        'start_time'  => $_POST['start_time'],
        'end_date'    => $_POST['end_date'],
        'end_time'    => $_POST['end_time'],
        'max_user'    => (int)$_POST['max_user']
    ];
    

    if (updateEvent($eventId, $data, $userId)) {
        header('Location: /Account-detail');
        exit;
    }
}

// การแสดงผลหน้าฟอร์ม (จะเข้าเงื่อนไขนี้เมื่อกดมาจากหน้า My Events)
$event = getEventById($eventId);

if (!$event || $event['create_by'] != $userId) {
    notFound(); 
    exit;
}

// ส่งข้อมูลผ่าน $data array ตามโครงสร้าง renderView เดิมของคุณ
renderView('edit_event', ['event' => $event]);
