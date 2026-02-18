<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างรหัส OTP - Acctivity</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Navbar -->
    <?php include 'navbar.html'; ?>
    <?php

$myEvents = [
    [
        'event_id' => 101,
        'title' => '🎣 กิจกรรมตกปลาหรรษา (Mock Data)',
    ],
    [
        'event_id' => 102,
        'title' => '🎮 แข่งขัน ROV ตีป้อม (Mock Data)',
    ],
    [
        'event_id' => 103,
        'title' => '🏃‍♂️ วิ่งมาราธอนการกุศล (Mock Data)',
    ]
];
// ------------------------------------

$generatedOtp = null;
$selectedEventId = null;

// ตรวจสอบว่ามีการกดปุ่ม "สร้าง OTP" หรือไม่ (Method POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่า ID กิจกรรม และ เวลาที่เลือก
    $selectedEventId = $_POST['event_id'] ?? null;

    if ($_POST['duration'] == "5") {
        $duration = $_POST['duration'] ?? 5;
    }else if ($_POST['duration'] == "15") {
        $duration = $_POST['duration'] ?? 15;
    }else if ($_POST['duration'] == "30") {
        $duration = $_POST['duration'] ?? 30;
    }
    $expireTimestamp = time() + ($duration * 60);


    if ($selectedEventId) {
        // --- ส่วนจำลองการสร้าง OTP ---
        // สุ่มตัวอักษรและตัวเลข 6 หลัก
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= $chars[rand(0, strlen($chars) - 1)];
        }

        // สร้าง Array ผลลัพธ์ OTP จำลอง
        $generatedOtp = [
            'otp_code' => $code, // รหัสที่สุ่มได้
            'expired' => date('Y-m-d H:i:s', strtotime("+$duration minutes")) // เวลาหมดอายุ
        ];
    }
}



?>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col items-center justify-center p-4 mt-16">

        <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="bg-blue-600 p-6 text-center">
                <h1 class="text-2xl font-bold text-white flex items-center justify-center gap-2">
                    <i data-lucide="key-round" class="w-8 h-8"></i>
                    ระบบสร้าง OTP เช็คอิน
                </h1>
                <p class="text-blue-100 text-sm mt-1">สำหรับผู้จัดกิจกรรม</p>
            </div>

            <div class="p-8">
                <!-- ส่วนแสดงผล OTP (จะโชว์เมื่อมีการกดสร้างแล้ว) -->
                <?php if (isset($generatedOtp) && $generatedOtp): ?>
                    <div class="mb-8 text-center animate-bounce-in">
                        <div class="bg-green-50 border-2 border-green-200 rounded-xl p-6 relative overflow-hidden">
                            <div class="absolute top-0 right-0 bg-green-500 text-white text-xs px-2 py-1 rounded-bl-lg">Active</div>
                            <h3 class="text-gray-500 text-sm mb-2">รหัส OTP สำหรับเช็คอิน</h3>
                            <div class="text-6xl font-mono font-bold text-gray-800 tracking-widest my-4">
                                <?php echo $generatedOtp['otp_code']; ?>
                            </div>
                            <p class="text-red-500 text-sm font-semibold flex items-center justify-center gap-1">
                                <i data-lucide="timer" class="w-4 h-4"></i>
                                หมดอายุ: <?php echo date('H:i น.', $expireTimestamp); ?>
                            </p>
                        </div>
                        <p class="text-gray-400 text-xs mt-4">แจ้งรหัสนี้ให้ผู้เข้าร่วมงานกรอกเพื่อยืนยันตัวตน</p>
                        <hr class="my-6 border-gray-100">
                    </div>
                <?php endif; ?>

                <!-- ฟอร์มสร้าง OTP -->
                <form action="/generate_otp" method="post" class="space-y-6">

                    <!-- เลือกกิจกรรม -->
                    <div>
                        <label for="event_id" class="block text-sm font-medium text-gray-700 mb-1">เลือกกิจกรรมของคุณ</label>
                        <div class="relative">
                            <select name="event_id" id="event_id" required
                                class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white transition shadow-sm">
                                <option value="" disabled <?php echo empty($selectedEventId) ? 'selected' : ''; ?>>-- กรุณาเลือกกิจกรรม --</option>
                                <?php
                                foreach ($myEvents as $event): ?>
                                    <option value="<?php
                                        echo $event['event_id']; ?>"<?php echo (isset($selectedEventId) && $selectedEventId == $event['event_id']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($event['title']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="absolute left-3 top-3.5 text-gray-400 pointer-events-none">
                                <i data-lucide="calendar" class="w-5 h-5"></i>
                            </div>
                            <div class="absolute right-3 top-3.5 text-gray-400 pointer-events-none">
                                <i data-lucide="chevron-down" class="w-5 h-5"></i>
                            </div>
                        </div>
                    </div>

                    <!-- ตั้งเวลา -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">อายุการใช้งาน (นาที)</label>
                        <div class="grid grid-cols-3 gap-2">
                            <label class="cursor-pointer">
                                <input type="radio" name="duration" value="5" class="peer sr-only">
                                <div class="peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 border border-gray-200 rounded-lg py-2 text-center text-gray-600 hover:bg-gray-50 transition">
                                    5 นาที
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="duration" value="15" class="peer sr-only" checked>
                                <div class="peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 border border-gray-200 rounded-lg py-2 text-center text-gray-600 hover:bg-gray-50 transition">
                                    15 นาที
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="duration" value="30" class="peer sr-only">
                                <div class="peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 border border-gray-200 rounded-lg py-2 text-center text-gray-600 hover:bg-gray-50 transition">
                                    30 นาที
                                </div>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg font-bold shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 transform hover:-translate-y-0.5 transition duration-200">
                        <i data-lucide="sparkles" class="w-5 h-5"></i>
                        สร้างรหัส OTP
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-6 text-center text-gray-400 text-sm">
            <a href="/home" class="hover:text-gray-600 transition underline">กลับหน้าหลัก</a>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>

