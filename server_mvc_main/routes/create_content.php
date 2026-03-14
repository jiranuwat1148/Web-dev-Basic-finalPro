<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    renderView('create_content');
    return;
}
$user = getUsersByEmail($_SESSION['email']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. นำวันที่และเวลามาต่อกันเป็นก้อนเดียว แล้วแปลงเป็นตัวเลข Timestamp เพื่อให้เปรียบเทียบง่ายขึ้น
    $start_datetime_str = $_POST['start_date'] . ' ' . $_POST['start_time'];
    $end_datetime_str   = $_POST['end_date'] . ' ' . $_POST['end_time'];

    $start_timestamp = strtotime($start_datetime_str);
    $end_timestamp   = strtotime($end_datetime_str);
    $current_timestamp = time(); // เวลาปัจจุบัน

    // 2. เช็คเวลาเริ่มต้องไม่เป็นอดีต
    if ($start_timestamp < $current_timestamp) {
        renderView('create_content', ['error' => '❌ ไม่สามารถสร้างกิจกรรมในอดีตได้ กรุณาตรวจสอบเวลาเริ่มต้น']);
        return; // หยุดการทำงาน ไม่บันทึกลงฐานข้อมูล
    }

    // 3. เช็คเวลาสิ้นสุดต้องมากกว่าเวลาเริ่ม
    if ($end_timestamp <= $start_timestamp) {
        renderView('create_content', ['error' => '❌ เวลาสิ้นสุดกิจกรรมต้องอยู่หลังจากเวลาเริ่มต้น']);
        return; // หยุดการทำงาน ไม่บันทึกลงฐานข้อมูล
    }

    // เตรียมข้อมูลให้ครบทุกคอลัมน์ที่ฐานข้อมูลต้องการ
    $data = [
        'title'       => $_POST['title'],
        'description' => $_POST['description'],
        'attribute'   => $_POST['attribute'] ?? 'General',
        'start_date'  => $_POST['start_date'],
        'start_time'  => $_POST['start_time'],
        'end_date'    => $_POST['end_date'],
        'end_time'    => $_POST['end_time'],
        'location'    => $_POST['location'] ?? 'N/A',
        'max_user'    => (int)($_POST['max_user'] ?? 50),
        'create_by'   => $user['user_id'] ?? 1
    ];

    $eventId = insertEvent($data);

    if (!empty($_FILES['images']['name'][0])) {
        insertEventImages($eventId, $_FILES['images']);
    }

    // Redirect ไปหน้าแสดงรายการ
    header("Location: /event_content"); 
    exit();
}
