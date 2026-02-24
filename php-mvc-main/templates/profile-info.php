<div class="w-full flex flex-col gap-1">
    <h3 class="text-xl font-semibold text-gray-700 mb-2">My Profile</h3>
    <!-- Event Item Example -->
    

    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
        <div class="flex items-center gap-4 w-1/2">
            <div class="flex flex-row">
                <h4 class="font-bold text-gray-800">ชื่อ</h4>
                <p class=" text-gray-500 mx-4 text-md"><?= $result['NAME'] ?></p>
            </div>
        </div>
        
    </div>
    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
        <div class="flex items-center gap-4 w-1/2">
            <div class="flex flex-row">
                <h4 class="font-bold text-gray-800">เพศ</h4>
                <p class=" text-gray-500 mx-4 text-md"><?= $result['gender'] ?></p>
            </div>
        </div>
    </div>
    <?php
    $birthdate = $result['birthday'];   // วันเกิด (YYYY-MM-DD)
    $today = date("Y-m-d");

    $diff = date_diff(date_create($birthdate), date_create($today));

    $age = $diff->y;
    ?>
    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
        <div class="flex items-center gap-4 w-1/2">
            <div class="flex flex-row">
                <h4 class="font-bold text-gray-800">อายุ</h4>
                <p class=" text-gray-500 mx-4 text-md"><?= $age ?></p>
            </div>
        </div>
    </div>
    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
        <div class="flex items-center gap-4 w-1/2">
            <div class="flex flex-row">
                <h4 class="font-bold text-gray-800">วันเกิด</h4>
                <p class=" text-gray-500 mx-4 text-md"><?= $birthdate ?></p>
            </div>
        </div>
    </div>
    <div class="flex flex-row justify-end mt-5">
        <form action="" method="post">
            <button type="submit" name="Edit"
                class="bg-red-600 text-center text-white p-2 rounded-lg hover:shadow-md transition">
                แก้ไข
            </button>
        </form>
    </div>
</div>