<?php

// 1. ดึงข้อมูลจริงจาก Database
$events = getAllEvents(); 

// 2. ตรวจสอบข้อมูลเบื้องต้น (ถ้ายัง NULL อยู่ แสดงว่าฟังก์ชันใน database.php พัง)
if ($events === null) {
    $events = []; 
}

renderView('event_content', ['events' => $events]);