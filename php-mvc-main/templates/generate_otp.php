<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ตั้งค่า Timezone เป็นประเทศไทย
date_default_timezone_set('Asia/Bangkok');

// นำเข้าไฟล์เชื่อมต่อฐานข้อมูล
require_once __DIR__ . '/../includes/database.php';
// ... โค้ดส่วนที่เหลือ

// นำเข้าไฟล์เชื่อมต่อฐานข้อมูล
require_once __DIR__ . '/../includes/database.php';

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

// 1. ดึงข้อมูลกิจกรรมสำหรับใส่ใน Select Box
$myEvents = getAllData();

// 2. ตรรกะ "ลบเมื่อหมดอายุ": ตรวจสอบ OTP ใน Session ถ้าหมดอายุแล้วให้ลบทิ้งทันที
if (isset($_SESSION['generateOtp'])) {
    if (time() > $_SESSION['generateOtp']['timestamp']) {
        unset($_SESSION['generateOtp']); // ลบทิ้งจากระบบทันที
    }
}

$generatedOtp = $_SESSION['generateOtp'] ?? null;

// 3. ตรวจสอบการสร้าง OTP ใหม่ (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedEventId = $_POST['event_id'] ?? null;
    $duration = isset($_POST['duration']) ? intval($_POST['duration']) : 5;

    if ($selectedEventId) {
        // สร้างรหัส OTP 6 หลัก
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= $chars[rand(0, strlen($chars) - 1)];
        }

        $expireTimestamp = time() + ($duration * 60);

        $generatedOtp = [
            'event_id' => $selectedEventId,
            'otp_code' => $code,
            'timestamp' => $expireTimestamp
        ];

        $_SESSION['generateOtp'] = $generatedOtp;
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างรหัส OTP - Acctivity</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <?php include 'navbar.php' ?>

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
                <?php if ($generatedOtp): ?>
                    <div class="mb-8 text-center">
                        <div class="bg-green-50 border-2 border-green-200 rounded-xl p-6 relative">
                            <div class="absolute top-0 right-0 bg-green-500 text-white text-xs px-2 py-1 rounded-bl-lg">ใช้งานได้</div>
                            <h3 class="text-gray-500 text-sm mb-2">รหัส OTP ของคุณคือ</h3>
                            <div class="text-6xl font-mono font-bold text-gray-800 tracking-widest my-4">
                                <?php echo htmlspecialchars($generatedOtp['otp_code']); ?>
                            </div>
                            <p class="text-red-500 text-sm font-semibold flex items-center justify-center gap-1">
                                <i data-lucide="timer" class="w-4 h-4"></i>
                                หมดอายุเวลา: <span id="expire-time">
                                    <?php echo date('H:i', $generatedOtp['timestamp']); ?> น.
                                </span>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>

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
                            <?php foreach ([1, 3, 5] as $min): ?>
                                <label class="cursor-pointer">
                                    <input type="radio" name="duration" value="<?php echo $min; ?>" class="peer sr-only" <?php echo ($min == 5) ? 'checked' : ''; ?>>
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
    </div>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>