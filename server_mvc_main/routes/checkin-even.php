<?php
require_once DATABASES_DIR . '/otp.php';
require_once DATABASES_DIR . '/registrations.php';
require_once DATABASES_DIR . '/events.php'; // เพื่อดึงรายชื่อกิจกรรม

// 1. ดึง user_id ของผู้ที่ล็อกอินอยู่ (Staff)
// อ้างอิงจาก login.php คุณเก็บแค่ $_SESSION['email'] ดังนั้นต้องดึงข้อมูล user ก่อน
$user = getUsersByEmail($_SESSION['email']);
$staff_id = $user['user_id'] ?? null;

// 2. ดึงรายการกิจกรรมทั้งหมดมาให้เลือก
// (Staff สามารถเลือกเช็คอินให้กิจกรรมไหนก็ได้)
$all_events = getAllEvents(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST['otp_input'] ?? '';
    $event_id = $_POST['event_id'] ?? null;

    // --- ส่วนสำคัญ: ดึง User ID ของ "เจ้าของ OTP" ---
    // ตาม Logic ใน otp.php: generateOtp จะเอา User ID 2 หลักแรกมาแปะหน้า OTP
    // ดังนั้นเราต้องแกะ ID ออกมาจากรหัสที่ Staff กรอกเข้ามา
    $participant_id = (int)substr($userInput, 0, 2);

    // 3. ตรวจสอบสิทธิ์ผู้เข้าร่วม (Approved หรือยัง?)
    if (!checkjoin((string)$participant_id, (int)$event_id)) {
        renderView('checkin-even', [
            'title' => 'Not Approved',
            'message' => 'ผู้เข้าร่วมคนนี้ยังไม่ได้รับการอนุมัติ หรือไม่ได้ลงทะเบียนในกิจกรรมนี้',
            'events' => $all_events
        ]);
        exit;
    }

    // 4. ตรวจสอบความถูกต้องของ OTP และบันทึกการเช็คอิน
    $status = otpindatabse($userInput); 
    
    if ($status === 'checkin success') {
        renderView('checkin-even', [
            'title' => 'success result',
            'message' => 'เช็คอินสำเร็จ! ยินดีด้วย',
            'events' => $all_events
        ]);
    } elseif ($status === 'otp is expire') {
        renderView('checkin-even', [
            'title' => 'otp expired',
            'message' => 'รหัส OTP หมดอายุแล้ว',
            'events' => $all_events
        ]);
    } else {
        renderView('checkin-even', [
            'title' => 'invalid OTP',
            'message' => 'รหัส OTP ไม่ถูกต้อง หรือเคยเช็คอินไปแล้ว',
            'events' => $all_events
        ]);
    }
} else {
    renderView('checkin-even', [
        'title' => 'Check-in OTP',
        'message' => 'กรุณาเลือกกิจกรรมและกรอก OTP จากผู้เข้าร่วม',
        'events' => $all_events
    ]);
}