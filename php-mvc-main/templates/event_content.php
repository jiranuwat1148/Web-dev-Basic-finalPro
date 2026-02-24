<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>content</title>
</head>

<body class="    h-screen w-screen">
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
                
                <!-- ================= ITEM 1 ================= -->
                <!-- ใช้ id เพื่ออ้างอิง (item1) -->
                <div class="w-full  rounded-lg px-4 py-4 flex flex-col transition-all duration-300 shadow-lg">
                    
                    <!-- ส่วนหัวที่โชว์ตลอด (Main Row) -->
                    <div class="flex justify-between items-center gap-4 h-32 overflow-y-auto no-scrollbar ">
                        <!-- รูป -->
                        <div class="w-32 h-32  overflow-hidden rounded-lg flex justify-center items-center shrink-0">
                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover">
                        </div>

                        <!-- เนื้อหาย่อ -->
                        <div class="flex-1 h-full  rounded-lg p-3 overflow-hidden">
                            <h1 class="text-xl font-bold mb-1">อยากตกปลา</h1>
                            <p class="text-sm text-gray-600 line-clamp-3">
                                lor
                            </p>
                        </div>

                        <!-- ปุ่มกด -->
                        <div class="w-32 h-full  rounded-lg flex flex-col justify-center items-center gap-2 p-2 shrink-0">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-1 rounded shadow transition">Join</button>
                            <!-- ปุ่ม Viewport กดเพื่อขยาย -->
                            <button onclick="toggleDetail('detail1')" class="w-full bg-white hover:bg-gray-200 text-gray-800 py-1 rounded shadow transition">
                                Viewport ▼
                            </button>
                        </div>
                    </div>

                    <!-- ส่วนรายละเอียดที่ซ่อนอยู่ (Expandable Detail) -->
                    <!-- ใช้ grid-rows-[0fr] เพื่อซ่อน -->
                    <div id="detail1" class="grid grid-rows-[0fr] transition-all duration-500 ease-in-out overflow-y-auto">
                        <div class="overflow-hidden">
                            <div class="mt-4 bg-white rounded-lg p-6">
                                <h2 class="text-2xl font-bold mb-2">รายละเอียดเพิ่มเติม</h2>
                                <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=600&q=80" class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-700">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias labore veritatis exercitationem, 
                                    ipsam cumque, fuga unde velit praesentium odio doloribus recusandae. 
                                    <br><br>
                                    - วันที่: 12 ธันวาคม 2024<br>
                                    - สถานที่: Hall 1, IMPACT<br>
                                    - ค่าเข้าชม: ฟรี
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ================= ITEM 1 ================= -->
                <!-- ใช้ id เพื่ออ้างอิง (item1) -->
                <div class="w-full rounded-lg px-4 py-4 flex flex-col transition-all duration-300 shadow-lg ">
                    
                    <!-- ส่วนหัวที่โชว์ตลอด (Main Row) -->
                    <div class="flex justify-between items-center gap-4 h-32 overflow-y-auto no-scrollbar ">
                        <!-- รูป -->
                        <div class="w-32 h-32  overflow-hidden rounded-lg flex justify-center items-center shrink-0">
                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover">
                        </div>

                        <!-- เนื้อหาย่อ -->
                        <div class="flex-1 h-full rounded-lg p-3 overflow-hidden">
                            <h1 class="text-xl font-bold mb-1">กิจกรรมตกปลา</h1>
                            <p class="text-sm text-gray-600 line-clamp-3">
                                lor
                            </p>
                        </div>

                        <!-- ปุ่มกด -->
                        <div class="w-32 h-full  rounded-lg flex flex-col justify-center items-center gap-2 p-2 shrink-0">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-1 rounded shadow transition">Join</button>
                            <!-- ปุ่ม Viewport กดเพื่อขยาย -->
                            <button onclick="toggleDetail('detail2')" class="w-full bg-white hover:bg-gray-200 text-gray-800 py-1 rounded shadow transition">
                                Viewport ▼
                            </button>
                        </div>
                    </div>

                    <!-- ส่วนรายละเอียดที่ซ่อนอยู่ (Expandable Detail) -->
                    <!-- ใช้ grid-rows-[0fr] เพื่อซ่อน -->
                    <div id="detail2" class="grid grid-rows-[0fr] transition-all duration-500 ease-in-out overflow-y-auto">
                        <div class="overflow-hidden">
                            <div class="mt-4 bg-white rounded-lg p-6">
                                <h2 class="text-2xl font-bold mb-2">รายละเอียดเพิ่มเติม</h2>
                                <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=600&q=80" class="w-full h-48 object-cover rounded-lg mb-4">
                                <p class="text-gray-700">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias labore veritatis exercitationem, 
                                    ipsam cumque, fuga unde velit praesentium odio doloribus recusandae. 
                                    <br><br>
                                    - วันที่: 12 ธันวาคม 2024<br>
                                    - สถานที่: Hall 1, IMPACT<br>
                                    - ค่าเข้าชม: ฟรี
                                </p>
                            </div>
                        </div>
                    </div>
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
