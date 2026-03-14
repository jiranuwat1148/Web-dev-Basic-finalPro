<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navbar.php'; ?>

    <div class="max-w-4xl mx-auto shadow-2xl mt-25 mb-10 border rounded-xl bg-white overflow-hidden">
        <div class="bg-gray-700 text-white font-bold text-2xl p-6">
            เพิ่มกิจกรรมใหม่ (Create New Event)
        </div>
        <?php if (!empty($data['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-8 mt-6">
                <span class="block sm:inline"><?= htmlspecialchars($data['error']) ?></span>
            </div>
        <?php endif; ?>
        <form action="/create_content" method="POST" enctype="multipart/form-data" class="p-8 space-y-6"
            onsubmit="return confirm('คุณตรวจสอบข้อมูลครบถ้วนและยืนยันที่จะสร้างกิจกรรมนี้ใช่หรือไม่?')">

            <div>
                <label class="block mb-2 font-semibold text-gray-700">ชื่อกิจกรรม (Title) <span class="text-red-500">*</span></label>
                <input type="text" name="title" required placeholder="เช่น อบรมเขียนเว็บ"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">หมวดหมู่ (Attribute)</label>
                    <input type="text"
                        name="attribute"
                        placeholder="ระบุหมวดหมู่ เช่น IT, กีฬา, สัมมนา"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">จำนวนผู้เข้าร่วมสูงสุด (Max User)</label>
                    <input type="number" name="max_user" value="50" min="1"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">วันที่เริ่ม</label>
                    <input type="date" name="start_date" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">เวลาเริ่ม</label>
                    <input type="time" name="start_time" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">วันที่สิ้นสุด</label>
                    <input type="date" name="end_date" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">เวลาสิ้นสุด</label>
                    <input type="time" name="end_time" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
            </div>
            <p id="timeWarning" class="text-red-500 text-sm font-semibold hidden mt-[-10px]">
                ⚠️ ข้อความเตือนจะแสดงตรงนี้
            </p>
            <div>
                <label class="block mb-2 font-semibold text-gray-700">สถานที่ (Location)</label>
                <input type="text" name="location" placeholder="เช่น ห้องคอม A หรือ ออนไลน์"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">รายละเอียดกิจกรรม</label>
                <textarea name="description" rows="4" placeholder="อธิบายกิจกรรมของคุณที่นี่..."
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>
            </div>
            <div>
                <label class="block mb-2 font-semibold text-gray-700">รูปภาพประกอบ (อัปโหลดได้หลายรูป)</label>
                <p class="text-xs text-blue-600 mb-3">
                    💡 <b>วิธีเลือกหลายรูป:</b> <br>
                    💻 <b>คอมพิวเตอร์:</b> กดปุ่ม Ctrl (หรือ Cmd) ค้างไว้แล้วคลิกเลือกรูป <br>
                    📱 <b>มือถือ:</b> แตะค้างที่รูปแรก แล้วแตะเลือกรูปอื่นๆ ต่อได้เลย
                </p>
                <input type="file" name="images[]" id="imageInput" multiple accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer border border-gray-300 rounded-lg">
                
                <div id="previewBox" class="mt-4 flex flex-wrap gap-4"></div>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="/event_content"
                    onclick="return confirm('ข้อมูลที่คุณกรอกจะหายไปทั้งหมด คุณแน่ใจใช่ไหมว่าจะยกเลิก?')"
                    class="px-8 py-3 bg-gray-200 text-gray-700 rounded-lg font-bold hover:bg-gray-300 transition text-center flex items-center">
                    ยกเลิก
                </a>

                <button type="submit" id="submitBtn"
                    class="px-8 py-3 bg-indigo-600 text-white rounded-lg font-bold hover:bg-indigo-700 shadow-lg transition">
                    บันทึกกิจกรรม
                </button>
            </div>
        </form>
    </div>
    <script>
        // 1. ดึงตัวแทนของแต่ละช่องมาเก็บไว้ในตัวแปร
        var startDate = document.querySelector('input[name="start_date"]');
        var startTime = document.querySelector('input[name="start_time"]');
        var endDate = document.querySelector('input[name="end_date"]');
        var endTime = document.querySelector('input[name="end_time"]');
        
        var warningText = document.getElementById('timeWarning'); // กล่องข้อความเตือน
        var submitBtn = document.getElementById('submitBtn'); // ปุ่มบันทึก

        // 2. ฟังก์ชันนี้จะทำงานทุกครั้งที่เราเปลี่ยนวันหรือเวลา
        function checkEventTime() {
            // ถ้ายังกรอกไม่ครบทั้ง 4 ช่อง ให้หยุดทำงานไปก่อน
            if (!startDate.value || !startTime.value || !endDate.value || !endTime.value) {
                return;
            }

            // เอาวันที่กับเวลามาต่อกัน เพื่อสร้างเป็นเวลาที่คอมพิวเตอร์เข้าใจ
            var start = new Date(startDate.value + 'T' + startTime.value);
            var end = new Date(endDate.value + 'T' + endTime.value);
            var now = new Date(); // เวลาปัจจุบันของวันนี้

            // 3. เริ่มตรวจสอบเงื่อนไข
            if (start < now) {
                // ผิดกฎข้อ 1: เลือกเวลาในอดีต
                warningText.innerHTML = "⚠️ไม่สามารถสร้างกิจกรรมย้อนหลังได้ กรุณาเลือกเวลาเริ่มใหม่";
                warningText.style.display = "block"; // โชว์ข้อความ
                submitBtn.disabled = true; // ล็อกปุ่ม
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed'); // ทำปุ่มสีจาง
            } 
            else if (end <= start) {
                // ผิดกฎข้อ 2: เวลาจบ ดันเกิดก่อนเวลาเริ่ม
                warningText.innerHTML = "⚠️เวลาสิ้นสุดกิจกรรม ไม่สามารถใช้เวลาที่ผ่านไปแล้วและเวลาที่ตรงกับตอนเริ่ม";
                warningText.style.display = "block";
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            } 
            else {
                // ทำถูกต้องหมดแล้ว
                warningText.style.display = "none"; // ซ่อนข้อความ
                submitBtn.disabled = false; // ปลดล็อกปุ่ม
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed'); // ให้ปุ่มสีเข้มเหมือนเดิม
            }
        }

        // 4. สั่งให้ฟังก์ชัน checkEventTime ทำงานทุกครั้งที่มีการเปลี่ยนค่าในช่องต่างๆ
        startDate.onchange = checkEventTime;
        startTime.onchange = checkEventTime;
        endDate.onchange = checkEventTime;
        endTime.onchange = checkEventTime;
    </script>
</body>

</html>
