<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acctivity - หน้าหลัก</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style> 
        body { font-family: 'Sarabun', sans-serif; } 
        .animate-float { animation: float 3s ease-in-out infinite; }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <?php include 'navbar.html'; ?>

    <!-- ================= Hero Section (Banner) ================= -->
    <div class="relative bg-gray-900 pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <!-- Background Image/Effect -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?auto=format&fit=crop&w=2000&q=80" alt="Activity Background" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-transparent"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center">
            <div class="text-center md:text-left md:w-1/2">
                <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                    <span class="block">ค้นหาและเข้าร่วม</span>
                    <span class="block text-blue-500">กิจกรรมที่คุณชื่นชอบ</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-300 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl md:mx-0">
                    Acctivity คือศูนย์รวมกิจกรรมสุดมันส์ ไม่ว่าจะเป็นกีฬา ดนตรี อาสาสมัคร หรือเวิร์คช็อป เปิดโลกใหม่ของคุณได้ที่นี่
                </p>
                <div class="mt-10 sm:flex sm:justify-center md:justify-start gap-4">
                    <div class="rounded-md shadow">
                        <a href="even_content.php" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition transform hover:scale-105">
                            ดูกิจกรรมทั้งหมด
                        </a>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <a href="createAcc.php" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-lg text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg md:px-10 transition">
                            สมัครสมาชิก
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Floating Image (Decoration) -->
            <div class="hidden md:block md:w-1/2 relative mt-10 md:mt-0 animate-float">
                <img src="https://cdn3d.iconscout.com/3d/premium/thumb/calendar-date-3d-icon-download-in-png-blend-fbx-gltf-file-formats--schedule-month-time-planner-reminder-user-interface-pack-icons-5379633.png?f=webp" 
                     class="w-80 h-auto mx-auto drop-shadow-2xl" alt="Calendar 3D">
            </div>
        </div>
    </div>

    <!-- ================= Features Section ================= -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">ทำไมต้องเลือกเรา</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    ง่าย สะดวก ครบจบในที่เดียว
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-6 bg-gray-50 rounded-xl border border-gray-100 hover:shadow-lg transition text-center group">
                    <div class="w-14 h-14 mx-auto bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mb-4 group-hover:scale-110 transition">
                        <i data-lucide="search" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">ค้นหาง่าย</h3>
                    <p class="text-gray-500">มีระบบค้นหาและกรองกิจกรรมที่ช่วยให้คุณเจอกิจกรรมที่ใช่ได้ในไม่กี่วินาที</p>
                </div>
                <!-- Feature 2 -->
                <div class="p-6 bg-gray-50 rounded-xl border border-gray-100 hover:shadow-lg transition text-center group">
                    <div class="w-14 h-14 mx-auto bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-4 group-hover:scale-110 transition">
                        <i data-lucide="users" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">สังคมคุณภาพ</h3>
                    <p class="text-gray-500">พบปะเพื่อนใหม่ที่มีความสนใจเดียวกัน สร้างเครือข่ายและมิตรภาพใหม่ๆ</p>
                </div>
                <!-- Feature 3 -->
                <div class="p-6 bg-gray-50 rounded-xl border border-gray-100 hover:shadow-lg transition text-center group">
                    <div class="w-14 h-14 mx-auto bg-purple-100 rounded-full flex items-center justify-center text-purple-600 mb-4 group-hover:scale-110 transition">
                        <i data-lucide="calendar-check" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">จัดการตารางชีวิต</h3>
                    <p class="text-gray-500">ระบบติดตามกิจกรรมที่คุณเข้าร่วม ช่วยให้คุณไม่พลาดทุกช่วงเวลาสำคัญ</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= Featured Events (กิจกรรมแนะนำ) ================= -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">กิจกรรมยอดฮิต 🔥</h2>
                    <p class="text-gray-500 mt-2">กิจกรรมที่มีผู้คนสนใจมากที่สุดในขณะนี้</p>
                </div>
                <a href="even_content.php" class="hidden md:flex text-blue-600 font-semibold hover:text-blue-800 items-center gap-1 transition">
                    ดูทั้งหมด <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group border border-gray-100 flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=500&q=80" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute top-2 right-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-md">Tech</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1 group-hover:text-blue-600 transition">Tech Conference 2024</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-1 line-clamp-2">งานสัมมนาเทคโนโลยีที่ใหญ่ที่สุด พบกับนวัตกรรมใหม่ๆ และ Speaker ระดับโลก</p>
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                            <div class="flex items-center text-gray-400 text-sm">
                                <i data-lucide="calendar" class="w-4 h-4 mr-1"></i> 12 ธ.ค.
                            </div>
                            <a href="even_content.php" class="text-blue-600 font-bold hover:underline text-sm">รายละเอียด</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group border border-gray-100 flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=500&q=80" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute top-2 right-2 bg-purple-600 text-white text-xs font-bold px-2 py-1 rounded-md">Art</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1 group-hover:text-purple-600 transition">นิทรรศการศิลปะร่วมสมัย</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-1 line-clamp-2">เสพงานศิลป์ จิบกาแฟ พร้อมพูดคุยกับศิลปินเจ้าของผลงาน</p>
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                            <div class="flex items-center text-gray-400 text-sm">
                                <i data-lucide="calendar" class="w-4 h-4 mr-1"></i> 15 ม.ค.
                            </div>
                            <a href="even_content.php" class="text-blue-600 font-bold hover:underline text-sm">รายละเอียด</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group border border-gray-100 flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=500&q=80" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute top-2 right-2 bg-green-600 text-white text-xs font-bold px-2 py-1 rounded-md">Health</span>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1 group-hover:text-green-600 transition">วิ่งมาราธอนการกุศล</h3>
                        <p class="text-gray-500 text-sm mb-4 flex-1 line-clamp-2">วิ่งเพื่อสุขภาพและร่วมบริจาคให้กับโรงพยาบาลในชนบท</p>
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                            <div class="flex items-center text-gray-400 text-sm">
                                <i data-lucide="calendar" class="w-4 h-4 mr-1"></i> 20 ก.พ.
                            </div>
                            <a href="even_content.php" class="text-blue-600 font-bold hover:underline text-sm">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center md:hidden">
                <a href="even_content.php" class="inline-block px-6 py-2 border border-blue-600 text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition">
                    ดูทั้งหมด
                </a>
            </div>
        </div>
    </div>

    <!-- ================= Footer ================= -->
    <footer class="bg-gray-800 text-white py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <h2 class="text-2xl font-bold text-white mb-4">Acctivity</h2>
                    <p class="text-gray-400 text-sm max-w-sm">
                        แพลตฟอร์มที่เชื่อมโยงผู้คนเข้าด้วยกันผ่านกิจกรรมที่หลากหลาย สร้างประสบการณ์ใหม่ๆ และความทรงจำดีๆ ไปด้วยกัน
                    </p>
                </div>
                <!-- Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-gray-200">เมนูลัด</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition">หน้าแรก</a></li>
                        <li><a href="even_content.php" class="hover:text-white transition">ค้นหากิจกรรม</a></li>
                        <li><a href="login.php" class="hover:text-white transition">เข้าสู่ระบบ</a></li>
                    </ul>
                </div>
                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-gray-200">ติดต่อเรา</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li class="flex items-center gap-2"><i data-lucide="mail" class="w-4 h-4"></i> contact@acctivity.com</li>
                        <li class="flex items-center gap-2"><i data-lucide="phone" class="w-4 h-4"></i> 02-123-4567</li>
                        <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> Bangkok, Thailand</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-xs text-gray-500">
                &copy; 2024 Acctivity. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>