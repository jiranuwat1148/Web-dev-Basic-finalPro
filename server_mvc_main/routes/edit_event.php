<?php
// ไฟล์: routes/edit_event.php

// รับค่า ID จาก POST เท่านั้นเพื่อรักษาความสะอาดของ URL
$eventId = (int)($_POST['event_id'] ?? 0);
$user = getUsersByEmail($_SESSION['email']);
$userId = $user['user_id'];

// ตรวจสอบว่าเป็นการกดปุ่ม "บันทึกการแก้ไข" หรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_update'])) {
    
    // เตรียมข้อมูลที่ผู้ใช้แก้ไข
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
    
    // 1. อัปเดตข้อมูลรายละเอียดกิจกรรมลงฐานข้อมูล
    if (updateEvent($eventId, $data, $userId)) {
        
        // 2. จัดการ "ลบรูปภาพเก่า" (ถ้ามีการติ๊กกล่องลบทิ้ง)
        if (isset($_POST['delete_images']) && !empty($_POST['delete_images'])) {
            foreach ($_POST['delete_images'] as $imagePath) {
                // เรียกใช้ฟังก์ชันลบรูปที่เราสร้างไว้
                deleteEventImage($eventId, $imagePath); 
            }
        }

        // 3. จัดการ "อัปโหลดรูปภาพใหม่" (ถ้ามีการเลือกไฟล์รูปเพิ่มมาด้วย)
        if (isset($_FILES['images']['name'][0]) && !empty($_FILES['images']['name'][0])) {
            insertEventImages($eventId, $_FILES['images']);
        }

        // 4. เมื่อทำงานทุกอย่างเสร็จ ให้เด้งกลับไปหน้าโปรไฟล์
        header('Location: /Account-detail');
        exit;
    }
}

// การแสดงผลหน้าฟอร์ม (จะเข้าเงื่อนไขนี้เมื่อกดปุ่ม "แก้ไขกิจกรรม" มาจากหน้า My Events)
$event = getEventById($eventId);

// ป้องกันคนแอบเข้าหน้าแก้ไขกิจกรรมของคนอื่น
if (!$event || $event['create_by'] != $userId) {
    notFound(); 
    exit;
}

// ส่งข้อมูลไปแสดงในฟอร์ม HTML
renderView('edit_event', ['event' => $event]);
