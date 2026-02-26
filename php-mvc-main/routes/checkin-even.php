<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $event_id = $_POST['event_id'];
}

$allEvents = getAllData(); 

if (!empty($allEvents)) {
    renderView('checkin-even', [
        'events' => $allEvents 
    ]);
} else {
    die("ไม่พบข้อมูลกิจกรรมในระบบฮาฟฟู่ววววว");
}
