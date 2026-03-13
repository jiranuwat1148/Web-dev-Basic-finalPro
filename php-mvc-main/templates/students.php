<?php include 'header.php' ?>
<script src="https://cdn.tailwindcss.com"></script>

<main class="max-w-5xl mx-auto p-6">
    <div class="flex flex-col md:flex-row gap-8">
        
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 text-center">
                <div class="w-24 h-24 bg-blue-500 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4 shadow-lg">
                    <?= isset($data['title']) ? substr($data['title'], 0, 1) : 'S' ?>
                </div>
                
                <?php if ($student = $data['result']->fetch_object()): ?>
                    <h2 class="text-2xl font-bold text-gray-800"><?= $student->first_name ?> <?= $student->last_name ?></h2>
                    <p class="text-gray-500 mb-6"><?= $student->email ?></p>
                    
                    <div class="text-left space-y-3 bg-gray-50 p-4 rounded-2xl border border-gray-100">
                        <p class="text-sm"><span class="text-gray-400 font-medium">รหัสนักเรียน:</span> <span class="text-gray-700 font-bold"><?= $student->student_id ?></span></p>
                        <p class="text-sm"><span class="text-gray-400 font-medium">เบอร์โทรศัพท์:</span> <span class="text-gray-700 font-bold"><?= $student->phone_number ?></span></p>
                    </div>

                    <div class="mt-8 space-y-3">
                        <a href="/logout" class="block w-full py-3 bg-red-50 text-red-600 rounded-xl font-bold hover:bg-red-100 transition">
                            ออกจากระบบ
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="w-full md:w-2/3">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-800">วิชาที่ลงทะเบียนแล้ว</h3>
                    <span class="bg-blue-100 text-blue-600 px-4 py-1 rounded-full text-sm font-bold">
                        <?= $data['courses']->num_rows ?> วิชา
                    </span>
                </div>

                <div class="space-y-4">
                    <?php 
                    $hasEnroll = false;
                    while($course = $data['courses']->fetch_object()): 
                        $hasEnroll = true;
                    ?>
                        <div class="flex justify-between items-center p-5 bg-white border border-gray-100 rounded-2xl hover:border-blue-200 hover:shadow-md transition">
                            <div>
                                <span class="text-xs font-black text-blue-500 uppercase tracking-wider"><?= $course->course_code ?></span>
                                <h4 class="text-lg font-bold text-gray-800"><?= $course->course_name ?></h4>
                                <p class="text-sm text-gray-400 mt-1">อาจารย์: <?= $course->instructor ?></p>
                            </div>
                            <form action="/enrollment-remove" method="POST" onsubmit="return confirm('⚠️ คุณต้องการถอนวิชา <?= $course->course_name ?> ใช่หรือไม่?')">
                                <input type="hidden" name="course_id" value="<?= $course->course_id ?>">
                                <button type="submit" class="text-red-400 hover:text-red-600 font-bold text-sm p-2 hover:bg-red-50 rounded-lg transition">
                                    ถอนวิชา
                                </button>
                            </form>
                        </div>
                    <?php endwhile; ?>

                    <?php if (!$hasEnroll): ?>
                        <div class="text-center py-16">
                            <div class="text-5xl mb-4 text-gray-200">Empty</div>
                            <p class="text-gray-400 mb-6">คุณยังไม่ได้ลงทะเบียนวิชาใดๆ ในเทอมนี้</p>
                            <a href="/courses" class="inline-block px-8 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-200 transition">
                                🚀 ไปหน้าลงทะเบียน
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</main>

<?php include 'footer.php' ?>