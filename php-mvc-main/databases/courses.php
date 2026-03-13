<?php

function getcourses(int $student_id): mysqli_result|bool
{
    global $conn;
    
    $sql = "SELECT c.course_id AS id, 
                   c.course_code, 
                   c.course_name, 
                   c.instructor,

                   IF(e.enrollment_id IS NOT NULL, 1, 0) AS is_enrolled
            FROM courses c
            LEFT JOIN enrollment e ON c.course_id = e.course_id AND e.student_id = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $student_id);
    $stmt->execute();
    return $stmt->get_result();
}
