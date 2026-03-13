<main>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php include 'header.php' ?>
<main class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8"><?= $data['title'] ?></h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php while ($row = $data['courseData']->fetch_object()): ?>
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100">
                <span class="inline-block bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold mb-3">
                    <?= $row->course_code ?>
                </span>
                <h3 class="text-xl font-bold text-gray-800 mb-2"><?= $row->course_name ?></h3>
                <p class="text-gray-500 mb-6 italic">ผู้สอน: <?= $row->instructor ?></p>
                
                <?php if ($row->is_enrolled == 1): ?>
                    <form action="/enrollment-remove" method="POST" onsubmit="return confirm('ยืนยันการถอนวิชา?')">
                        <input type="hidden" name="course_id" value="<?= $row->id ?>">
                        <button type="submit" class="w-full py-2 bg-red-50 text-red-600 rounded-xl font-medium hover:bg-red-100 transition">
                            ถอนวิชา
                        </button>
                    </form>
                <?php else: ?>
                    <form action="/enrollment-add" method="POST" onsubmit="return confirm('ยืนยันการลงทะเบียน?')">
                        <input type="hidden" name="course_id" value="<?= $row->id ?>">
                        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 transition">
                            ลงทะเบียน
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</main>