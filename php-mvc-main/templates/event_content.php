
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>content</title>
</head>

<body class="h-screen w-screen">

    <?php include 'navbar.php' ?>
    <div class="w-full h-full flex justify-center items-center rounded-lg overflow-hidden overflow-y-auto">
        <div class="w-1/2 h-[80%]  rounede-lg overflow-hidden overflow-y-auto no-scrollbar">
            <div class="w-full flex flex-col bg-white px-4 py-4 gap-4">
                <div class="w-full text-6xl font-bold">
                    Events
                </div>

                <div class="w-full flex justify-between items-center">
                    <div class="text-xl px-6 rounded-lg bg-gray-500 h-12 flex justify-center items-center text-white cursor-pointer hover:bg-gray-600 transition">
                        <a href="/create_content">Create Content</a>
                    </div>

                    <div class="w-1/2">
                        <form action="#" method="get" class="flex justify-end items-center gap-2">
                            <input type="text" class="w-full max-w-xs h-10 border-2 border-black rounded-lg px-2" placeholder="Search...">
                            <button type="submit" class="text-xl font-semibold hover:bg-blue-100 hover:rounded-lg px-4 py-1 transition">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full flex-1 px-4 py-4 overflow-y-auto space-y-4 no-scrollbar">

                <?php if (!empty($data['events'])): ?>
                    <?php foreach ($data['events'] as $event): ?>
                        <div class="w-full rounded-lg px-4 py-4 flex flex-col shadow-lg bg-white border border-gray-100">
                            <div class="flex justify-between items-center gap-4 h-32">
                                <div class="w-32 h-32 overflow-hidden rounded-lg shrink-0 bg-gray-100 border flex justify-center items-center">
                                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover">
                                </div>

                                <div class="flex-1 h-full p-3 overflow-hidden flex flex-col justify-between">
                                    <div>
                                        <h1 class="text-xl font-bold mb-1"><?php echo htmlspecialchars($event['title']); ?></h1>
                                    </div>
                                </div>

                                <div class="w-32 h-full flex flex-col justify-center items-center gap-2 p-2 shrink-0">
                                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-1 rounded shadow transition"
                                    onclick="return confirm('คุณต้องการเข้าร่วมกิจกรรมนี้ใช่หรือไม่?')">
                                        Join
                                    </button>
                                    <button onclick="toggleDetail('db-<?php echo $event['event_id']; ?>')" class="w-full bg-white text-gray-800 py-1 rounded shadow border">
                                        Viewport ▼
                                    </button>
                                </div>
                            </div>
                            <div id="db-<?php echo $event['event_id']; ?>" class="grid grid-rows-[0fr] transition-all duration-500 ease-in-out">
                                <div class="overflow-hidden p-4 bg-gray-50 mt-2 rounded">
                                    <p class="mt-2 text-gray-700"><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
                                    <div class="mt-2 space-y-1 text-sm text-gray-600">
                                                    <div class="flex items-center gap-2">
                                                        <span class="font-semibold text-blue-600">📅 เริ่มต้น:</span>
                                                        <?php
                                                        // แปลง datetime จากฐานข้อมูลให้เป็นรูปแบบที่อ่านง่าย
                                                        echo date('d/m/Y H:i', strtotime($event['start_date']));
                                                        ?> น.
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <span class="font-semibold text-red-600">🏁 สิ้นสุด:</span>
                                                        <?php
                                                        echo date('d/m/Y H:i', strtotime($event['end_date']));
                                                        ?> น.
                                                    </div>
                                                </div>
                                    <p><strong>📍 สถานที่:</strong> <?php echo htmlspecialchars($event['location'] ?? 'ไม่ระบุ'); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
</body>

</html>
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
</style>

 <script>
        function toggleDetail(id) {
            const element = document.getElementById(id);
            
            // เช็คว่าเปิดอยู่ไหม
            if (element.classList.contains('grid-rows-[0fr]')) {
                // ถ้าปิดอยู่ -> เปิด (1fr)
                element.classList.remove('grid-rows-[0fr]');
                element.classList.add('grid-rows-[1fr]');
            } else {
                // ถ้าเปิดอยู่ -> ปิด (0fr)
                element.classList.remove('grid-rows-[1fr]');
                element.classList.add('grid-rows-[0fr]');
            }
        }

    </script>
