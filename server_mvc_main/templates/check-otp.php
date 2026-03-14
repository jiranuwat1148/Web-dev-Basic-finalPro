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
        
        .checkin-container { max-width: 450px; margin: 50px auto; background: white; padding: 40px 30px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); text-align: center; }
        

        .alert { padding: 15px; margin-bottom: 25px; border-radius: 8px; font-size: 16px; line-height: 1.5; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-info { background-color: #cce5ff; color: #004085; border: 1px solid #b8daff; }
        

        .otp-input { width: 100%; max-width: 250px; font-size: 32px; letter-spacing: 12px; text-align: center; padding: 15px; border: 2px solid #ced4da; border-radius: 8px; margin-bottom: 25px; outline: none; color: #495057; transition: 0.3s; }
        .otp-input:focus { border-color: #28a745; box-shadow: 0 0 8px rgba(40, 167, 69, 0.2); }
        
        .btn-submit { background-color: #28a745; color: white; padding: 15px 30px; font-size: 18px; font-weight: bold; border: none; border-radius: 8px; cursor: pointer; width: 100%; transition: 0.3s; }
        .btn-submit:hover { background-color: #218838; }
    </style>
</head>
<body>
    <header>
        <h1>ระบบเช็คอิน (Staff Mode)</h1>
    </header>
    <nav>
        <a href="/">Home</a> | <a href="/events">Events</a> | <a href="/check-otp">Check-in</a> | <a href="/dashboard">Dashboard</a>
    </nav>

    <main class="checkin-container">
        <h2 style="margin-top: 0;">ตรวจสอบการเข้างาน</h2>

        <?php 
        if (isset($data['message'])) {
            $alertClass = 'alert-info';
            $title = strtolower($data['title']);
            
            if (strpos($title, 'success') !== false) {
                $alertClass = 'alert-success'; 
            } elseif (strpos($title, 'expire') !== false || strpos($title, 'invalid') !== false || strpos($title, 'not found') !== false) {
                $alertClass = 'alert-danger';
            }
            echo "<div class='alert {$alertClass}'>{$data['message']}</div>";
        }
        ?>

        <p style="color: #6c757d; margin-bottom: 20px;">กรุณากรอกรหัส OTP 6 หลัก<br>จากหน้าจอมือถือของผู้เข้าร่วมกิจกรรม</p>

        <form action="check-otp" method="POST">
            <input type="text" name="otp_input" class="otp-input" maxlength="6" placeholder="000000" autocomplete="off" required autofocus>
            
            <button type="submit" class="btn-submit">✔️ ยืนยันการเช็คอิน</button>
        </form>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?>. All rights reserved by Aj.M.</p>
    </footer>
</body>
</html>