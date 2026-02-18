<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เช็คอินเข้างาน - Acctivity</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style> body { font-family: 'Sarabun', sans-serif; } </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <?php include 'navbar.html'; ?>

    <div class="flex-1 flex flex-col items-center justify-center p-4 mt-16">
        
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="bg-indigo-600 p-6 text-center">
                <div class="mx-auto bg-white/20 w-16 h-16 rounded-full flex items-center justify-center mb-3 backdrop-blur-sm">
                    <i data-lucide="qr-code" class="w-8 h-8 text-white"></i>
                </div>
                <h1 class="text-2xl font-bold text-white">เช็คอินเข้าร่วมงาน</h1>
                <p class="text-indigo-100 text-sm mt-1">กรอกรหัส OTP ที่ได้รับจากผู้จัดงาน</p>
            </div>

            <div class="p-8">
                <!-- ส่วนแสดงผลลัพธ์ (Success/Error) -->
                <?php if (isset($status)): ?>
                    <?php if ($status === 'success'): ?>
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-start gap-3 animate-fade-in">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mt-0.5"></i>
                            <div>
                                <h3 class="font-bold text-green-800">เช็คอินสำเร็จ!</h3>
                                <p class="text-sm text-green-600">ยินดีต้อนรับเข้าสู่กิจกรรม "<?php echo $eventName ?? 'กิจกรรม'; ?>"</p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg flex items-center gap-3 animate-shake">
                            <i data-lucide="alert-circle" class="w-5 h-5 text-red-500"></i>
                            <span class="text-sm text-red-600 font-medium"><?php echo $message; ?></span>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- ฟอร์มกรอก OTP -->
                <form action="/checkin-even" method="post" class="space-y-6">
                    
                    <div>
                        <label for="otp_code" class="block text-sm font-medium text-gray-700 mb-2 text-center">รหัส 6 หลัก</label>
                        <input type="text" name="otp_code" id="otp_code" maxlength="6" required autofocus
                            placeholder="A 1 B 2 C 3"
                            class="w-full text-center text-3xl font-mono tracking-[0.5em] py-4 border-2 border-gray-300 rounded-xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 uppercase transition-all placeholder-gray-300"
                            value="<?php echo $_POST['otp_code'] ?? ''; ?>"
                            oninput="this.value = this.value.toUpperCase()">
                    </div>

                    <button type="submit" name="subcheck" class="w-full flex items-center justify-center gap-2 bg-indigo-600 text-white py-3.5 rounded-xl font-bold shadow-lg hover:bg-indigo-700 transform active:scale-95 transition duration-200">
                        ยืนยันการเช็คอิน
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </button>
                </form>
                <?php if ($_POST['subcheck'] == $generatedOtp['otpcode']):?>
                  <script> alert("seccess full")</script>               
                <?php endif; ?>
            </div>
        </div>
        
        <div class="mt-8 text-center">
            <p class="text-gray-500 text-sm">มีปัญหาในการเช็คอิน?</p>
            <a href="#" class="text-indigo-600 font-medium text-sm hover:underline">ติดต่อผู้จัดงาน</a>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>

