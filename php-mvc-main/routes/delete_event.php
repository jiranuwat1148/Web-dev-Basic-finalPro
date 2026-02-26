<?php
// ตรวจสอบว่าเป็นคำขอแบบ POST หรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
    
    // ดึงข้อมูลผู้ใช้ปัจจุบันจาก Session เพื่อตรวจสอบสิทธิ์
    $userEmail = $_SESSION['email'];
    $user = getUsersByEmail($userEmail);
    
    $eventId = (int)$_POST['event_id'];
    $userId = $user['user_id'];

    // เรียกฟังก์ชันลบจาก Model
    if (deleteEvent($eventId, $userId)) {
        // เมื่อลบสำเร็จ ให้ส่งกลับไปที่หน้า Account Detail
        header('Location: /Account-detail');
        exit;
    } else {
        echo "ไม่สามารถลบกิจกรรมได้ หรือคุณไม่มีสิทธิ์ในกิจกรรมนี้";
    }
} else {
    // หากเข้าถึงด้วยวิธีอื่น ให้ดีดกลับไปหน้าหลัก
    header('Location: /Account-detail');
    exit;
}