<div class="w-full flex flex-col gap-1">
    <h3 class="text-xl font-semibold text-gray-700 mb-2">Edit Profile</h3>
    <!-- Event Item Example -->
    <form method="post" action="profile-edit">
        
        <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition mb-1">
            <div class="flex items-center gap-4 w-1/2">
                <div class="flex flex-row gap-22">
                    <h4 class="font-bold text-gray-800">ชื่อ</h4>
                    <input class="border rounded" name="name" type="text" placeholder="<?= $result['name'] ?>">
                </div>
            </div>

        </div>
        <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition mb-1">
            <div class="flex items-center gap-4 w-1/2">
                <div class="flex flex-row gap-20">
                    <h4 class="font-bold text-gray-800">เพศ</h4>
                    <select class="border rounded" name="gender">
                        <option value="ชาย" <?= $result['gender'] == 'ชาย' ? 'selected' : '' ?>>ชาย</option>
                        <option value="หญิง" <?= $result['gender'] == 'หญิง' ? 'selected' : '' ?>>หญิง</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
            <div class="flex items-center gap-4 w-1/2">
                <div class="flex flex-row gap-15">
                    <h4 class="font-bold text-gray-800">วันเกิด</h4>
                    <input
                        type="date"
                        class="border rounded"
                        name="birthday"
                        value="<?= $result['birthday'] ?>">
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-end mt-5 gap-2">
            <button type="submit" name="re"
                class="bg-green-600 text-center text-white p-2 rounded-lg hover:shadow-md transition">
                ยืนยัน
            </button>
            <button type="submit" name="subProfile"
                class="bg-gray-600 text-center text-white p-2 rounded-lg hover:shadow-md transition">
                ย้อนกลับ
            </button>
        </div>
    </form>

</div>