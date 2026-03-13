<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center rounded-b-lg mb-6">
    <div class="text-2xl font-bold text-blue-600">WebSite Name</div>
    <div class="space-x-4">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href='/students' class="text-gray-600 hover:text-blue-500 transition">ข้อมูลนักเรียน</a>
            <a href="/courses" class="text-gray-600 hover:text-blue-500 transition">วิชา</a>
            <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Logout</a>
        <?php else : ?>
            <a href="/login" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Login here</a>
        <?php endif; ?>
    </div>
</nav>