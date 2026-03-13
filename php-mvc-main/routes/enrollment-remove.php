<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = (int)$_SESSION['user_id'];
    $course_id = (int)$_POST['course_id'];

    if ($student_id > 0 && $course_id > 0) {
        removeEnrollment($student_id, $course_id); // ฟังก์ชันใน databases/enrollment.php
    }
}
header('Location: /courses');
exit;