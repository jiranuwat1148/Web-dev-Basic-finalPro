<?php include 'header.php' ?>
<script src="https://cdn.tailwindcss.com"></script>

<main class="flex items-center justify-center min-h-[80vh] bg-gray-50">
    <div class="bg-white p-10 rounded-3xl shadow-xl w-full max-w-md border border-gray-100">
        
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">ยินดีต้อนรับ</h1>
            <p class="text-gray-500 mt-2">กรุณาเข้าสู่ระบบเพื่อดำเนินการต่อ</p>
        </div>

        <?php if (isset($data['error'])): ?>
            <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-6 text-sm font-medium border border-red-100 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <?= $data['error'] ?>
            </div>
        <?php endif; ?>

        <form action="login" method="post" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">อีเมลผู้ใช้</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" 
                    placeholder="name@example.com" />
            </div>
            
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">รหัสผ่าน</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition" 
                    placeholder="••••••••" />
            </div>

            <button type="submit" 
                class="w-full py-4 bg-blue-600 text-white rounded-xl font-bold text-lg hover:bg-blue-700 shadow-lg shadow-blue-200 transition transform active:scale-[0.98]">
                เข้าสู่ระบบ
            </button>
        </form>

        <p class="text-center text-gray-400 text-sm mt-8">
            มีปัญหาในการใช้งาน? <a href="/contact" class="text-blue-500 hover:underline">ติดต่อผู้ดูแลระบบ</a>
        </p>
    </div>
</main>

<?php include 'footer.php' ?>