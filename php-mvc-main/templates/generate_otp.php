<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างรหัส OTP - Acctivity</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style> body { font-family: 'Sarabun', sans-serif; } </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Navbar -->
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>

    <?php
    // Mock Data กิจกรรม
    $myEvents = [
        ['event_id' => 101, 'title' => '🎣 กิจกรรมตกปลาหรรษา'],
        ['event_id' => 102, 'title' => '🎮 แข่งขัน ROV ตีป้อม'],
        ['event_id' => 103, 'title' => '🏃‍♂️ วิ่งมาราธอนการกุศล'],
    ];

    $generatedOtp = $_SESSION['generateOtp'] ?? null; // ดึงค่าเก่าถ้ามี
    $selectedEventId = null;

    // ตรวจสอบการ POST ข้อมูล
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedEventId = $_POST['event_id'] ?? null;
        $duration = isset($_POST['duration']) ? intval($_POST['duration']) : 15;

        if ($selectedEventId) {
            // สร้างรหัส OTP 6 หลัก
            $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = '';
            for ($i = 0; $i < 6; $i++) {
                $code .= $chars[rand(0, strlen($chars) - 1)];
            }

            // คำนวณเวลาหมดอายุ
            $expireTimestamp = time() + ($duration * 60);

            // บันทึกลง Session
            $generatedOtp = [
                'event_id' => $selectedEventId,
                'otp_code' => $code,
                'expired_at' => date('Y-m-d H:i:s', $expireTimestamp),
                'timestamp' => $expireTimestamp // เก็บ timestamp ไว้เทียบง่ายๆ
            ];

            $_SESSION['generateOtp'] = $generatedOtp;
        }
    }
    ?>
        <?php include 'navbar.html' ?>

    <div class="flex-1 flex flex-col items-center justify-center p-4 mt-8">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="bg-blue-600 p-6 text-center">
                <h1 class="text-2xl font-bold text-white flex items-center justify-center gap-2">
                    <i data-lucide="key-round" class="w-8 h-8"></i>
                    ระบบสร้าง OTP
                </h1>
                <p class="text-blue-100 text-sm mt-1">สำหรับผู้จัดกิจกรรม</p>
            </div>

            <div class="p-8">
                <!-- ส่วนแสดงผล OTP -->
                <?php if ($generatedOtp): ?>
                    <div class="mb-8 text-center animate-pulse-once">
                        <div class="bg-green-50 border-2 border-green-200 rounded-xl p-6 relative overflow-hidden">
                            <div class="absolute top-0 right-0 bg-green-500 text-white text-xs px-2 py-1 rounded-bl-lg">Active</div>
                            <h3 class="text-gray-500 text-sm mb-2">รหัส OTP สำหรับเช็คอิน</h3>
                            <div class="text-6xl font-mono font-bold text-gray-800 tracking-widest my-4">
                                <?php echo htmlspecialchars($generatedOtp['otp_code']); ?>
                            </div>
                            <p class="text-red-500 text-sm font-semibold flex items-center justify-center gap-1">
                                <i data-lucide="timer" class="w-4 h-4"></i>
                                หมดอายุ: <?php echo date('H:i น.', $generatedOtp['timestamp']); ?>
                            </p>
                        </div>
                        <p class="text-gray-400 text-xs mt-4">Event ID: <?php echo $generatedOtp['event_id']; ?></p>
                    </div>
                <?php endif; ?>

                <!-- ฟอร์มสร้าง OTP -->
                <form action="" method="post" class="space-y-6">
                    <div>
                        <label for="event_id" class="block text-sm font-medium text-gray-700 mb-1">เลือกกิจกรรม</label>
                        <div class="relative">
                            <select name="event_id" id="event_id" required class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 appearance-none bg-white">
                                <option value="" disabled selected>-- กรุณาเลือกกิจกรรม --</option>
                                <?php foreach ($myEvents as $event): ?>
                                    <option value="<?php echo $event['event_id']; ?>" 
                                        <?php echo (isset($generatedOtp['event_id']) && $generatedOtp['event_id'] == $event['event_id']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($event['title']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="absolute left-3 top-3.5 text-gray-400 pointer-events-none"><i data-lucide="calendar" class="w-5 h-5"></i></div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">อายุการใช้งาน</label>
                        <div class="grid grid-cols-3 gap-2">
                            <?php foreach ([5, 15, 30] as $min): ?>
                            <label class="cursor-pointer">
                                <input type="radio" name="duration" value="<?php echo $min; ?>" class="peer sr-only" <?php echo ($min == 15) ? 'checked' : ''; ?>>
                                <div class="peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 border border-gray-200 rounded-lg py-2 text-center text-gray-600 hover:bg-gray-50 transition">
                                    <?php echo $min; ?> นาที
                                </div>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg font-bold shadow-lg hover:shadow-xl transition">
                        <i data-lucide="sparkles" class="w-5 h-5"></i> สร้างรหัส OTP ใหม่
                    </button>
                </form>
            </div>
        </div>
        <div class="mt-4 text-center">
             <a href="checkin.php" class="text-blue-600 underline font-medium" target="_blank">ไปที่หน้าเช็คอิน (จำลองฝั่ง User) -></a>
        </div>
    </div>
    <script> lucide.createIcons(); </script>
</body>
</html>