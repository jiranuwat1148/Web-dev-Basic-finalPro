<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event - Acctivity</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navbar.php'; ?>

    <div class="max-w-4xl mx-auto shadow-2xl mt-25 mb-10 border rounded-xl bg-white overflow-hidden">
        <div class="bg-gray-700 text-white font-bold text-2xl p-6">
            แก้ไขข้อมูลกิจกรรม (Edit Event)
        </div>

        <form action="/edit_event" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            
            <input type="hidden" name="event_id" value="<?= $data['event']['event_id'] ?>">

            <div>
                <label class="block mb-2 font-semibold text-gray-700">ชื่อกิจกรรม (Title) <span class="text-red-500">*</span></label>
                <input type="text" name="title" required value="<?= htmlspecialchars($data['event']['title']) ?>"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">หมวดหมู่ (Attribute)</label>
                    <input type="text" name="attribute" value="<?= htmlspecialchars($data['event']['attribute']) ?>"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">จำนวนผู้เข้าร่วมสูงสุด (Max User)</label>
                    <input type="number" name="max_user" value="<?= $data['event']['max_user'] ?>"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">วันที่เริ่ม</label>
                    <input type="date" name="start_date" required 
                        value="<?= date('Y-m-d', strtotime($data['event']['start_date'])) ?>" 
                        class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">เวลาเริ่ม</label>
                    <input type="time" name="start_time" required 
                        value="<?= date('H:i', strtotime($data['event']['start_date'])) ?>" 
                        class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">วันที่สิ้นสุด</label>
                    <input type="date" name="end_date" required 
                        value="<?= date('Y-m-d', strtotime($data['event']['end_date'])) ?>" 
                        class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">เวลาสิ้นสุด</label>
                    <input type="time" name="end_time" required 
                        value="<?= date('H:i', strtotime($data['event']['end_date'])) ?>" 
                        class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
            </div>
            <p id="timeWarning" class="text-red-500 text-sm font-semibold hidden mt-[-10px]">
                ⚠️ ข้อความเตือนจะแสดงตรงนี้
            </p>
            <div>
                <label class="block mb-2 font-semibold text-gray-700">สถานที่ (Location)</label>
                <input type="text" name="location" value="<?= htmlspecialchars($data['event']['location']) ?>"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">รายละเอียดกิจกรรม</label>
                <textarea name="description" rows="4" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"><?= htmlspecialchars($data['event']['description']) ?></textarea>
            </div>
            <div class="border-t border-gray-200 pt-6 mt-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">จัดการรูปภาพ</h3>
                
                <label class="block mb-2 font-semibold text-gray-700">รูปภาพปัจจุบัน <span class="text-sm text-red-500 font-normal">(ติ๊กเลือกที่รูปเพื่อลบทิ้ง)</span></label>
                <?php 
                    $currentImages = getEventImages($data['event']['event_id']); 
                    if (!empty($currentImages)): 
                ?>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <?php foreach ($currentImages as $img): ?>
                            <div class="relative rounded-lg overflow-hidden border border-gray-200 shadow-sm group h-32">
                                <img src="/<?= htmlspecialchars($img) ?>" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200">
                                    <label class="cursor-pointer flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-sm font-bold shadow-lg transition">
                                        <input type="checkbox" name="delete_images[]" value="<?= htmlspecialchars($img) ?>" class="w-4 h-4 cursor-pointer accent-red-600">
                                        ลบรูปนี้
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-sm text-gray-500 mb-6 bg-gray-50 p-3 rounded-lg border border-dashed border-gray-300">ไม่มีรูปภาพปัจจุบัน</p>
                <?php endif; ?>

                <label class="block mb-2 font-semibold text-gray-700">เพิ่มรูปภาพใหม่ (อัปโหลดได้หลายรูป)</label>
                <div class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:bg-indigo-50 hover:border-indigo-400 transition cursor-pointer group">
                    <input type="file" name="images[]" id="imageInput" multiple accept="image/*"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="text-gray-500 group-hover:text-indigo-500 transition">
                        <svg class="mx-auto h-10 w-10 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        <p class="text-sm font-semibold">คลิกเพื่อเลือกรูปภาพ หรือ ลากไฟล์มาวางที่นี่</p>
                    </div>
                </div>
                <div id="fileListContainer" class="mt-4"></div>
            </div>
            <div class="flex justify-end gap-4 pt-4">
                <a href="/Account-detail" 
                    class="px-8 py-3 bg-gray-200 text-gray-700 rounded-lg font-bold hover:bg-gray-300 transition text-center flex items-center">
                    ยกเลิก
                </a>

                <button type="submit" name="submit_update" id="submitBtn"
                    class="px-8 py-3 bg-indigo-600 text-white rounded-lg font-bold hover:bg-indigo-700 shadow-lg transition">
                    บันทึกการแก้ไข
                    
                </button>
            </div>
        </form>
    </div>
    <script>
        var startDate = document.querySelector('input[name="start_date"]');
        var startTime = document.querySelector('input[name="start_time"]');
        var endDate = document.querySelector('input[name="end_date"]');
        var endTime = document.querySelector('input[name="end_time"]');
        
        var warningText = document.getElementById('timeWarning');
        var submitBtn = document.getElementById('submitBtn');

        function checkEventTime() {
            if (!startDate.value || !startTime.value || !endDate.value || !endTime.value) {
                return;
            }

            var start = new Date(startDate.value + 'T' + startTime.value);
            var end = new Date(endDate.value + 'T' + endTime.value);
            var now = new Date();

            if (start < now) {
                warningText.innerHTML = "⚠️หากแก้ไขเวลาใหม่ ไม่สามารถตั้งเป็นเวลาในอดีตได้";
                warningText.style.display = "block";
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            } 
            else if (end <= start) {
                warningText.innerHTML = "⚠️เวลาสิ้นสุดกิจกรรม ไม่สามารถใช้เวลาที่ผ่านไปแล้วและเวลาที่ตรงกับตอนเริ่ม";
                warningText.style.display = "block";
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            } 
            else {
                warningText.style.display = "none";
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }

        // ให้ระบบเช็คเฉพาะตอนที่มีคนมากดเปลี่ยนวัน-เวลาเท่านั้น 
        // (ถ้าเข้ามาแก้แค่ชื่อหรือรายละเอียด ระบบจะไม่บล็อกแม้กิจกรรมจะเริ่มไปแล้ว)
        startDate.onchange = checkEventTime;
        startTime.onchange = checkEventTime;
        endDate.onchange = checkEventTime;
        endTime.onchange = checkEventTime;
    </script>
</body>

</html>
