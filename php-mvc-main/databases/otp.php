<?php
function getAllData(): array
{
    $conn = getConnection();
    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);
    $events = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }
    return $events;
}
function generateOTP($userId, $eventId) {
    $conn = getConnection();
    $otpCode = rand(100000, 999999);
    $expiredTime = date('Y-m-d H:i:s', strtotime('+30 minutes'));
    $sql = "INSERT INTO otps (otp_code, expired, user_id, event_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $otpCode, $expiredTime, $userId, $eventId);
    if ($stmt->execute()) {
        return $otpCode;
    } else {
        return false;
    }
}

function verifyOTP($inputOtp, $eventId) {
    $conn = getConnection();
    $sql = "SELECT * FROM otps WHERE otp_code = ? AND event_id = ? AND expired > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $inputOtp, $eventId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}