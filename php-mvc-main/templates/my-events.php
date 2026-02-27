<div class="w-full h-12 flex justify-center items-center mb-8">
    <form action="" method="post" class="flex flex-1 overflow-hidden">
        
        <input type="hidden" name="subEvent" value="1">
        
        <input type="text" name="searchMyEvent" 
               value="<?= htmlspecialchars($_POST['searchMyEvent'] ?? '') ?>" 
               class="w-full h-full rounded-lg hover:bg-blue-100 bg-white border border-gray-200 shadow-sm px-4 py-2 focus:bg-blue-50 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500" 
               placeholder="ค้นหากิจกรรมที่คุณสร้าง...">
        
        <button type="submit" class="h-full text-xl hover:cursor-pointer hover:bg-blue-600 bg-blue-500 text-white rounded-lg px-6 mx-2 py-1 items-center flex justify-center transition">
            Search
        </button>
    </form>
</div>
<div class="w-full flex flex-col gap-4">
    <h3 class="text-xl font-semibold text-gray-700 mb-2">My Events</h3>

    <?php
    // ตรวจสอบว่ามีข้อมูลกิจกรรมที่ผู้ใช้สร้างหรือไม่
    if ($my_events && $my_events->num_rows > 0):
        while ($row = $my_events->fetch_object()):
    ?>
            <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:shadow-md transition mb-2">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 font-bold overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=200&q=80" alt="Event Image" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800"><?= htmlspecialchars($row->title) ?></h4>
                        <p class="text-sm text-gray-500">สถานที่: <?= htmlspecialchars($row->location) ?></p>
                    </div>
                </div>
                <form action="/registration_event" method="POST">
                    <input type="hidden" name="event_id" value="<?= $row->event_id ?>">
                    <button type="submit" class="text-green-600 font-semibold hover:text-green-800 hover:underline cursor-pointer transition">
                        รายชื่อคนสมัคร
                    </button>
                </form>
                <div class="flex gap-3">
                    <form action="/edit_event" method="POST">
                        <input type="hidden" name="event_id" value="<?= $row->event_id ?>">
                        <button type="submit" name="view_edit" class="text-blue-600 font-semibold hover:underline cursor-pointer">
                            แก้ไขกิจกรรม
                        </button>
                    </form>

                    <form action="/delete_event" method="POST" onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะลบกิจกรรมนี้?')">
                        <input type="hidden" name="event_id" value="<?= $row->event_id ?>">
                        <button type="submit" class="text-red-600 font-semibold hover:underline cursor-pointer">
                            ลบ
                        </button>
                    </form>
                </div>
            </div>
        <?php
        endwhile;
    else:
        ?>
        <div class="text-center py-10 text-gray-500 bg-white rounded-xl border border-dashed border-gray-300">
            ยังไม่มีกิจกรรมที่คุณสร้าง
        </div>
    <?php endif; ?>
</div>


