<?php
// ดึง ID จาก Session มาใช้
$id = $_SESSION['user_id']; 
// เรียก Model ที่ทำ SQL LEFT JOIN ไว้
$result = getcourses($id);

renderView('courses', [
    'title' => 'รายวิชาที่เปิดลงทะเบียน',
    'courseData' => $result
]);