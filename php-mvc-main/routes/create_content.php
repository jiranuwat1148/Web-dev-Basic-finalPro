<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    renderView('create_content');
    return;
}

$user = getUsersByEmail($_SESSION['email']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // เตรียมข้อมูลให้ครบทุกคอลัมน์ที่ฐานข้อมูลต้องการ
    $data = [
        'title'       => $_POST['title'], // รับจากฟอร์มชื่อ event_name มาใส่ title
        'description' => $_POST['description'],
        'attribute'   => $_POST['attribute'] ?? 'General', // เพิ่มฟิลด์ประเภท
        'start_date'  => $_POST['start_date'],
        'start_time'  => $_POST['start_time'],
        'end_date'    => $_POST['end_date'],
        'end_time'    => $_POST['end_time'],
        'location'    => $_POST['location'] ?? 'N/A',
        'max_user'    => (int)($_POST['max_user'] ?? 50),
        'create_by'   => $user['user_id'] ?? 1 // ใช้ ID จาก Session หรือ default เป็น 1 note:แก้
    ];

    $eventId = insertEvent($data);

    if (!empty($_FILES['images']['name'][0])) {
        insertEventImages($eventId, $_FILES['images']);
    }

    // Redirect ไปหน้าแสดงรายการ (ตรวจสอบ Path ให้ตรงกับ Router ของคุณ)
    header("Location: /event_content"); 
    exit();
    // หลังจากบันทึกข้อมูลกิจกรรมและรูปภาพเสร็จแล้ว

}
