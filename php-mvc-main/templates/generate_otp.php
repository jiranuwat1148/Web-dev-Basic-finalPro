<div class="container" style="text-align: center; margin-top: 100px; font-family: sans-serif;">
    <h1>กิจกรรม: <?php echo htmlspecialchars($eventName); ?> 🎪</h1>
    <p>กรุณากดปุ่มเพื่อรับรหัสผ่านเข้างาน</p>

    <button id="btn-request-otp" 
            data-event-id="<?php echo $eventId; ?>" 
            style="padding: 15px 30px; font-size: 1.2rem; cursor: pointer; background: #4F46E5; color: white; border: none; border-radius: 10px;">
        ขอรหัส OTP 🎟️
    </button>
</div>

<div id="otp-modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index: 1000;">
    <div style="background:white; width:320px; margin:150px auto; padding:30px; text-align:center; border-radius:20px; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        <h3 style="margin-bottom: 10px;">รหัส OTP ของคุณคือ</h3>
        <h1 id="otp-display" style="letter-spacing:10px; color:#1D4ED8; font-size: 3rem; margin: 20px 0;">------</h1>
        <p style="color:#EF4444; font-size: 0.9rem;">⏰ รหัสมีอายุ 30 นาที</p>
        <button onclick="document.getElementById('otp-modal').style.display='none'" 
                style="margin-top: 20px; padding: 10px 20px; cursor: pointer; border-radius: 5px; border: 1px solid #ccc;">
            ปิดหน้าต่าง
        </button>
    </div>
</div>

<script>
document.getElementById('btn-request-otp').addEventListener('click', function() {
    const eventId = this.getAttribute('data-event-id');

    // เรียกไปที่ /generate_otp_action (ตามระบบ Router)
    fetch('/generate_otp_action', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'event_id=' + eventId
    })
    .then(response => response.text())
    .then(otpCode => {
        if (otpCode.trim() !== 'error' && otpCode.length >= 6) {
            document.getElementById('otp-display').innerText = otpCode;
            document.getElementById('otp-modal').style.display = 'block';
        } else {
            alert('ไม่สามารถขอ OTP ได้ กรุณาลองใหม่อีกครั้ง');
        }
    })
    .catch(err => alert('การเชื่อมต่อผิดพลาด'));
});
</script>