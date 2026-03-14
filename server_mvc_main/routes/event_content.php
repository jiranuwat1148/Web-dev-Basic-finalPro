<?php
// เปลี่ยนจาก $_GET เป็น $_POST
$search = $_POST['search'] ?? '';
$start_date = $_POST['start_date'] ?? '';
$end_date = $_POST['end_date'] ?? '';

// ส่งค่าไปค้นหา (ฟังก์ชันใน databases/events.php ของคุณรองรับค่าเหล่านี้อยู่แล้ว)
$events = getAllEvents($search, $start_date, $end_date); 

if ($events === null) {
    $events = []; 
}

// ส่งค่ากลับไปที่ View เพื่อแสดงในช่อง Input เดิมหลังกดค้นหา
renderView('event_content', [
    'events' => $events,
    'old_search' => $search,
    'old_start' => $start_date,
    'old_end' => $end_date
]);