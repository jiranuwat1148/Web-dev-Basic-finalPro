<!-- Search Bar -->
<div class="w-full h-12 flex justify-center items-center mb-8">
    <form action="##" method="get" class="flex flex-1 overflow-hidden">
        <input type="text" class="w-full h-full rounded-lg hover:bg-blue-100 bg-white border border-gray-200 shadow-sm px-4 py-2 focus:bg-blue-50 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ค้นหากิจกรรมของคุณ">
        <button type="submit" class="h-full text-xl hover:cursor-pointer hover:bg-blue-600 bg-blue-500 text-white rounded-lg px-6 mx-2 py-1 items-center flex justify-center transition">Search</button>
    </form>
</div>
<!-- Content Area -->
<div class="w-full flex flex-col gap-4">
    <h3 class="text-xl font-semibold text-gray-700 mb-2">My Events</h3>
    <!-- Event Item Example -->
     <?php while ($row = $event_his->fetch_object()) {?>
    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:shadow-md transition">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 font-bold">
                E 
            </div>
            <div>
                <h4 class="font-bold text-gray-800"><?= $row->title ?></h4>
                <p class="text-sm text-gray-500">สถานะ : <?= $row->STATUS ?></p>
                <p class="text-sm text-gray-500">วันที่ <?= $date = (new DateTime($row->start_date))->format('d/m/Y'); ?> เวลา : <?= (new DateTime($row->start_date))->format('H:i'); ?> - <?= (new DateTime($row->end_date))->format('H:i'); ?></p>
            </div>
        </div>
        <button class="text-blue-600 hover:underline">ดูรายละเอียด</button>
    </div>
    <?php } ?>
</div>
