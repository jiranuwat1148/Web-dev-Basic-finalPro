<?php
function addEnrollment(int $student_id, int $course_id): bool {
    $conn = getConnection();
    $sql = "INSERT INTO enrollment (student_id, course_id, enrollment_date) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $student_id, $course_id);
    return $stmt->execute();
}

function removeEnrollment(int $student_id, int $course_id): bool {
    $conn = getConnection();
    $sql = "DELETE FROM enrollment WHERE student_id = ? AND course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $student_id, $course_id);
    return $stmt->execute();
}

function getEnrollmentsByStudent(int $student_id): mysqli_result|bool {
    $conn = getConnection(); // ดึงการเชื่อมต่อฐานข้อมูลมาใช้
    $sql = "SELECT e.*, c.course_name, c.course_code, c.instructor 
            FROM enrollment e 
            JOIN courses c ON e.course_id = c.course_id 
            WHERE e.student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $student_id); // 'i' หมายถึงตัวเลข integer
    $stmt->execute();
    return $stmt->get_result();
}