<button id="get-otp-btn">ขอรหัส OTP เพื่อเข้างาน 🎟️</button>

<div id="otp-modal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background:white; padding:20px; border:1px solid #ccc; box-shadow: 0 4px 8px rgba(0,0,0,0.2); z-index:1000;">
    <h3>รหัส OTP ของคุณคือ:</h3>
    <h1 id="display-otp" style="color: blue; letter-spacing: 5px;">------</h1>
    <p>⚠️ รหัสมีอายุ 30 นาที</p>
    <button onclick="document.getElementById('otp-modal').style.display='none'">ปิดหน้าต่าง</button>
</div>