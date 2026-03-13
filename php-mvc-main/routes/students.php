<?php
$id = $_SESSION['user_id']; 
$keyword = $_GET['keyword'] ?? '';

// ดึงวิชาที่ "ลงทะเบียนแล้ว" เท่านั้นมาโชว์ในโปรไฟล์
$courses = getEnrollmentsByStudent($id);

if ($keyword == '') {    
    $result = getStudentById($id);
} else {
    $result = getStudentsByKeyword($keyword);
}

renderView('students', [
    'title' => 'โปรไฟล์ส่วนตัว', 
    'result' => $result,
    'courses' => $courses
]);