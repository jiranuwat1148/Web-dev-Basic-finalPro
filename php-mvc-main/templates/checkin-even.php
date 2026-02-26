<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เช็คอินเข้างาน - Acctivity</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex flex-col">

    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <?php include 'navbar.php' ?>
    <div class="flex-1 flex flex-col items-center justify-center p-4 mt-16">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Header Section -->
            <div class="bg-indigo-600 p-8 text-center relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-indigo-800/30 rounded-full blur-2xl"></div>

                <div class="relative z-10 mx-auto bg-white/20 w-20 h-20 rounded-2xl flex items-center justify-center mb-4 backdrop-blur-md border border-white/30 rotate-3">
                    <i data-lucide="key-round" class="w-10 h-10 text-white"></i>
                </div>
                <h1 class="text-2xl font-bold text-white relative z-10">เช็คอินเข้าร่วมงาน</h1>
                <p class="text-indigo-100 text-sm mt-2 relative z-10 opacity-90">กรอกรหัส OTP 6 หลัก ที่ได้รับจากผู้จัดงาน</p>
            </div>

            <div class="p-8">
                <form action="/routes/checkin-even" method="post" class="space-y-8">
                    <select name="event_id" required class="...">
                        <option value="">-- เลือกกิจกรรมที่จะเช็คอิน --</option>
                        <?php foreach ($events as $row): ?>
                            <option value="<?= $row['event_id'] ?>">
                                <?= htmlspecialchars($row['title']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="space-y-3">
                        <label for="otp_code" class="block text-sm font-semibold text-gray-500 uppercase tracking-widest text-center">รหัสยืนยัน</label>
                        <input type="text" name="otp_code" id="otp_code" maxlength="6" required autofocus
                            placeholder="······"
                            class="w-full text-center text-4xl font-mono tracking-[0.4em] py-5 border-2 border-gray-200 rounded-2xl focus:ring-8 focus:ring-indigo-50 focus:border-indigo-500 focus:outline-none uppercase transition-all placeholder-gray-200 bg-gray-50/50"
                            value=""
                            oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '')">
                    </div>

                    <button type="submit" name="subcheck" class="group w-full flex items-center justify-center gap-3 bg-indigo-600 text-white py-4 rounded-2xl font-bold shadow-xl shadow-indigo-200 hover:bg-indigo-700 active:scale-95 transition-all duration-200">
                        <span>ยืนยันการเช็คอิน</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="generate_otp.php" class="text-indigo-600 font-semibold text-sm hover:underline flex items-center justify-center gap-1">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> กลับไปหน้าสร้าง OTP (สำหรับทดสอบ)
            </a>
        </div>
    </div>

    <!-- Custom Notification Modal -->
    <div id="statusModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeModal()"></div>
        <div id="modalContent" class="relative bg-white w-full max-w-sm rounded-3xl shadow-2xl p-8 text-center transform transition-all">
            <div id="statusIconContainer" class="mx-auto w-20 h-20 rounded-full flex items-center justify-center mb-6 border-4">
                <i id="statusIcon" data-lucide="check" class="w-10 h-10"></i>
            </div>
            <h2 id="statusTitle" class="text-2xl font-bold text-gray-800 mb-2"></h2>
            <p id="statusMsg" class="text-gray-500 mb-8"></p>
            <button onclick="closeModal()" class="w-full py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-2xl transition-colors">
                ตกลง
            </button>
        </div>
    </div>

    <script>
        lucide.createIcons();

        const modal = document.getElementById('statusModal');
        const statusIconContainer = document.getElementById('statusIconContainer');
        const statusIcon = document.getElementById('statusIcon');
        const statusTitle = document.getElementById('statusTitle');
        const statusMsg = document.getElementById('statusMsg');

        function showNotification(type, title, message) {
            modal.classList.remove('hidden');
            if (type === 'success') {
                statusIconContainer.className = "mx-auto w-20 h-20 rounded-full flex items-center justify-center mb-6 border-4 border-green-100 bg-green-50 text-green-600";
                statusIcon.setAttribute('data-lucide', 'check-circle');
                statusTitle.innerText = title || "สำเร็จ";
                statusTitle.className = "text-2xl font-bold text-green-600 mb-2";
            } else {
                statusIconContainer.className = "mx-auto w-20 h-20 rounded-full flex items-center justify-center mb-6 border-4 border-red-100 bg-red-50 text-red-600";
                statusIcon.setAttribute('data-lucide', 'alert-circle');
                statusTitle.innerText = title || "เกิดข้อผิดพลาด";
                statusTitle.className = "text-2xl font-bold text-red-600 mb-2";
            }
            statusMsg.innerText = message;
            lucide.createIcons();
        }

        function closeModal() {
            modal.classList.add('hidden');
        }

        // แสดงผลแจ้งเตือนเมื่อ PHP ประมวลผลเสร็จ
        window.onload = function() {
            <?php if ($currentStatus): ?>
                const status = "<?php echo $currentStatus; ?>";
                const msg = "<?php echo addslashes($message); ?>";

                if (status === 'success') {
                    showNotification('success', 'ยินดีด้วย!', msg);
                } else {
                    showNotification('error', 'ไม่สำเร็จ', msg);
                }
            <?php endif; ?>
        };
    </script>
</body>

</html>