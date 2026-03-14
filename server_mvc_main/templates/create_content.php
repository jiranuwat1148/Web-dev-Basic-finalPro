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
                <label class="block mb-2 font-semibold text-gray-700">รูปภาพประกอบ (ได้มากกว่า 1 รูป)</label>
                <input type="file" name="images[]" multiple
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer border border-gray-300 rounded-lg">
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="/event_content"
                    onclick="return confirm('ข้อมูลที่คุณกรอกจะหายไปทั้งหมด คุณแน่ใจใช่ไหมว่าจะยกเลิก?')"
                    class="px-8 py-3 bg-gray-200 text-gray-700 rounded-lg font-bold hover:bg-gray-300 transition text-center flex items-center">
                    ยกเลิก
                </a>

                <button type="submit"
                    class="px-8 py-3 bg-indigo-600 text-white rounded-lg font-bold hover:bg-indigo-700 shadow-lg transition">
                    บันทึกกิจกรรม
                </button>
            </div>
        </form>
    </div>

</body>

</html>
