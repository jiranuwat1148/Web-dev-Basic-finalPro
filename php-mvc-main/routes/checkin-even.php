<?php
require_once DATABASES_DIR . '/otp.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST['otp_input'] ?? '';
    $status = otpindatabse($userInput); 
    
    if ($status === 'checkin success') {
        renderView('checkin-even', [
            'title' => 'checkin result',
            'message' => 'you are check in success'
        ]);
    } elseif ($status === 'otp is expire') {
        renderView('checkin-even', [
            'title' => 'otp is expired',
            'message' => 'sorry your otp is expire'
        ]);
    } else {
        renderView('checkin-even', [
            'title' => 'invalic OTP',
            'message' => 'turn back to home page and call support or try reconnect'
        ]);
    }
} else {
    renderView('checkin-even', [
        'title' => 'Check-in OTP',
        'message' => 'Please enter your OTP code.'
    ]);
}
