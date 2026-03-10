<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; margin: 0; padding: 0; }
        header, nav, footer { text-align: center; padding: 15px; }
        nav a { text-decoration: none; color: #007bff; font-weight: bold; margin: 0 10px; }
        
        .otp-card { max-width: 380px; margin: 40px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); text-align: center; }
        .user-badge { display: inline-block; background: #17a2b8; color: white; padding: 5px 15px; border-radius: 20px; font-size: 14px; margin-bottom: 15px;}
        
        .otp-number { font-size: 54px; color: #2c3e50; letter-spacing: 8px; background: #ecf0f1; padding: 20px; border-radius: 12px; margin: 20px 0; font-weight: bold; border: 2px dashed #bdc3c7; }
        
        .timer { color: #e74c3c; font-weight: bold; font-size: 20px; }
        .btn-refresh { background-color: #007bff; color: white; border: none; padding: 15px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; margin-top: 15px; width: 100%; transition: 0.3s; }
        .btn-refresh:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <header>
        <h1>Acctivity website</h1>
    </header>
    <nav>
        <a href="event_content">Back</a>
    </nav>

    <main class="otp-card">
        <?php $currentUser = getUsersByEmail($_SESSION['email']); ?>
        <div class="user-badge">User ID ของคุณคือ: <?= $currentUser['user_id'] ?></div>

        <h2 style="margin: 0; color: #333;">รหัสเข้างานของคุณ</h2>
        <p style="color: #666; font-size: 14px;">โปรดยื่นหน้าจอนี้ให้เจ้าหน้าที่หน้าประตู</p>
        
        <div class="otp-number">
            <?= $data['otp_code'] ?>
        </div>
        
        <p>รหัสจะหมดอายุในเวลา<br><span class="timer"><?= date('H:i:s', strtotime($data['expires_at'])) ?></span></p>
        
        <button class="btn-refresh" onclick="window.location.reload();">🔄 ขอรหัสใหม่ (Refresh)</button>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?>. All rights reserved by EEE</p>
    </footer>

    <script>
        // นับเวลาถอยหลัง 5 นาทีแล้วรีเฟรชอัตโนมัติ
        setTimeout(function(){
            window.location.reload();
        }, 5 * 60 * 1000);
    </script>
</body>
</html>