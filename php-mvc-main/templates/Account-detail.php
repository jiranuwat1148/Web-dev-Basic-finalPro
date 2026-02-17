<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
</head>

<body class="h-screen w-screen flex flex-col bg-gray-100">
    <?php include 'navbar.html' ?>

    <div class="flex flex-1 w-full h-full overflow-hidden mt-16">
        <!-- Sidebar / Profile Image -->
        <div class="w-1/4 h-full bg-white border-r border-gray-200 flex flex-col items-center pt-12 shadow-sm">
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-blue-500 shadow-lg">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUOmilg14nh-ZJQzEnTBXjSMX_6fQf0gVxZg&s" alt="Profile_Me" class="w-full h-full object-cover">
            </div>
            <h2 class="mt-4 text-2xl font-bold text-gray-800">User Name</h2>
            <p class="text-gray-500 text-sm">Member since 2024</p>

            <div class="mt-8 w-full px-6 space-y-2">
                <?php $page = isset($_GET['page']) ? $_GET['page']  : 'profile_info'; ?>
                <div class="flex flex-col flex-1 ">
                    <a href="?page=events_his" class="block w-full text-left px-4 py-3 rounded-lg font-medium transition duration-200 <?php echo $page == 'events_his' ? 'bg-blue-50 text-blue-600 shadow-sm border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-50'; ?>">
                        📜 Events History
                        
                    </a>
                    <a href="?page=my_events" class="block w-full text-left px-4 py-3 rounded-lg font-medium transition duration-200 <?php echo $page == 'my_events' ? 'bg-blue-50 text-blue-600 shadow-sm border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-50'; ?>">
                        📅 My Events
                    </a>
                    <a href="?page=profile_info" class="block w-full text-left px-4 py-3 rounded-lg font-medium transition duration-200 <?php echo $page == 'profile_info' ? 'bg-blue-50 text-blue-600 shadow-sm border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-50'; ?>">
                        👤 Profile Info
                    </a>
                    <a href="?page=chart" class="block w-full text-left px-4 py-3 rounded-lg font-medium transition duration-200 <?php echo $page == 'chart' ? 'bg-blue-50 text-blue-600 shadow-sm border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-50'; ?>">
                        📊 Chart
                    </a>
                </div>
            </div>

        </div>
        <div class="flex-1 flex flex-col justify-start items-center p-8 overflow-y-auto">
            <div class="w-full max-w-4xl flex flex-col justify-start items-center ">
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'profile_info';
                switch ($page) {
                    case 'events_his':
                        echo '<!-- Search Bar -->
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
                        <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:shadow-md transition">
                        <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 font-bold">
                        DEC
                        </div>
                        <div>
                        <h4 class="font-bold text-gray-800">ตกปลาล่าชะโด</h4>
                        <p class="text-sm text-gray-500">สถานะ: เข้าร่วมแล้ว</p>
                    </div>
                </div>
                <button class="text-blue-600 hover:underline">ดูรายละเอียด</button>
                </div>
                </div>';
                        break;
                    case 'my_events':
                        echo '<div class="w-full h-12 flex justify-center items-center mb-8">
                    <form action="##" method="get" class="flex flex-1 overflow-hidden">
                        <input type="text" class="w-full h-full rounded-lg hover:bg-blue-100 bg-white border border-gray-200 shadow-sm px-4 py-2 focus:bg-blue-50 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ค้นหากิจกรรมของคุณ">
                        <button type="submit" class="h-full text-xl hover:cursor-pointer hover:bg-blue-600 bg-blue-500 text-white rounded-lg px-6 mx-2 py-1 items-center flex justify-center transition">Search</button>
                    </form>
                </div>
                <div class="w-full flex flex-col gap-4">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">My Events</h3>
                    <!-- Event Item Example -->
                    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:shadow-md transition">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 font-bold">
                                <img src="https://us-fbcloud.net/wb/data/1409/1409286-img.vjaxav.53qo7.jpg" alt="Profile_Me" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">ลงขันซื้อเบ็ดตกปลาใหม่</h4>
                                <p class="text-sm text-gray-500">สถานะ: กำลังดำเนินการ</p>
                            </div>
                        </div>
                        <button class="text-blue-600 hover:underline">แก้ไขกิจกรรม</button>
                    </div>
                    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:shadow-md transition">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 font-bold">
                                <img src="https://us-fbcloud.net/wb/data/1409/1409286-img.vjaxav.53qo7.jpg" alt="Profile_Me" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">ลงขันซื้อเบ็ดตกปลาใหม่</h4>
                                <p class="text-sm text-gray-500">สถานะ: กำลังดำเนินการ</p>
                            </div>
                        </div>
                        <button class="text-blue-600 hover:underline">แก้ไขกิจกรรม</button>
                    </div>
                </div>';
                        break;

                    case 'chart':
                        include 'chart.html';
                        break;        

                    default:
                        echo  '<div class="w-full flex flex-col gap-1">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">My Profile</h3>
                    <!-- Event Item Example -->
                    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
                        <div class="flex items-center gap-4 w-1/2">
                            <div>
                                <h4 class="font-bold text-gray-800">รูปโปรไฟล์</h4>
                                <p class="text-sm text-gray-500"></p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end  w-1/2 flex-row px-4 gap-2">
                            <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center text-blue-500 font-bold">
                                <img src="https://us-fbcloud.net/wb/data/1409/1409286-img.vjaxav.53qo7.jpg" alt="Profile_Me" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <button class="text-blue-600 hover:underline">แก้ไข</button>
                        </div>
                     </div>

                    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
                        <div class="flex items-center gap-4 w-1/2">
                            <div class="flex flex-row">
                                <h4 class="font-bold text-gray-800">ชื่อ</h4>
                                <p class=" text-gray-500 mx-4 text-md">Who am i?</p>
                            </div>
                        </div>
                        <div class="flex items-end justify-end w-1/2 flex-col px-4">
                            <button class="text-blue-600 hover:underline">แก้ไข</button>
                        </div>
                    </div>
                    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
                        <div class="flex items-center gap-4 w-1/2">
                            <div class="flex flex-row">
                                <h4 class="font-bold text-gray-800">เพศ</h4>
                                <p class=" text-gray-500 mx-4 text-md">ชาย</p>
                            </div>
                        </div>
                        <div class="flex items-end justify-end w-1/2 flex-col px-4">
                            <button class="text-blue-600 hover:underline">แก้ไข</button>
                        </div>
                    </div>
                    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
                        <div class="flex items-center gap-4 w-1/2">
                            <div class="flex flex-row">
                                <h4 class="font-bold text-gray-800">อายุ</h4>
                                <p class=" text-gray-500 mx-4 text-md">21</p>
                            </div>
                        </div>
                        <div class="flex items-end justify-end w-1/2 flex-col px-4">
                            <button class="text-blue-600 hover:underline">แก้ไข</button>
                        </div>
                    </div>
                    <div class="w-full bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-start items-center hover:shadow-md transition">
                        <div class="flex items-center gap-4 w-1/2">
                            <div class="flex flex-row">
                                <h4 class="font-bold text-gray-800">วันเกิด</h4>
                                <p class=" text-gray-500 mx-4 text-md">1/01/2000</p>
                            </div>
                        </div>
                        <div class="flex items-end justify-end w-1/2 flex-col px-4">
                            <button class="text-blue-600 hover:underline">แก้ไข</button>
                        </div>
                    </div>
                </div>';
                break;
                }
                ?>
            </div>
        </div>
</body>

</html>