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
            
            <div class="flex justify-end gap-4 pt-4">
                <a href="/Account-detail" 
                    class="px-8 py-3 bg-gray-200 text-gray-700 rounded-lg font-bold hover:bg-gray-300 transition text-center flex items-center">
                    ยกเลิก
                </a>

                <button type="submit" name="submit_update"
                    class="px-8 py-3 bg-indigo-600 text-white rounded-lg font-bold hover:bg-indigo-700 shadow-lg transition">
                    บันทึกการแก้ไข
                </button>
            </div>
        </form>
    </div>
</body>

</html>