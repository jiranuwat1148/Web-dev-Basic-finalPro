<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = (int)($_SESSION['user_id'] ?? 0); 
    
    $course_id = (int)($_POST['course_id'] ?? 0);

    if ($student_id > 0 && $course_id > 0) {
        addEnrollment($student_id, $course_id);
    }
}
header('Location: /courses');
exit;