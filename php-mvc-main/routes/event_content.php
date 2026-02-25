<?php

// 1. ดึงข้อมูลจริงจาก Database
$events = getAllEvents(); 

// 2. ตรวจสอบข้อมูลเบื้องต้น 
if ($events === null) {
    $events = []; 
}

renderView('event_content', ['events' => $events]);
