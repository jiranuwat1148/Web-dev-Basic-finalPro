<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body class="h-screen w-screen bg-gray-100 ">
    <div class="flex flex-col h-full w-full">
        <?php include 'navbar.php' ?>
        <div class="flex flex-col items-center justify-center h-full w-full">
            <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-6 h-[70%] hover:shadow-[0_0_15px_rgba(59,130,246,0.5)]">
                <h2 class="text-6xl font-bold text-gray-900 mb-4 text-center mt-8">เปลี่ยนรหัสผ่าน</h2>
                <form action="changePw" method="post" class="flex flex-col gap-8 mt-5">
                    <div>
                        <p>รหัสผ่านเก่า</p>
                        <input name="oldPw" type="password" required class="w-full focus:shadow-[0_0_15px_rgba(59,130,246,0.5)] hover:shadow-[0_0_15px_rgba(59,130,246,0.5)] text-2xl bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                            placeholder="รหัสผ่านเก่า">
                    </div>
                    <div>
                        <p>รหัสผ่านใหม่</p>
                        <input name="NewPw" type="password" required class="w-full focus:shadow-[0_0_15px_rgba(59,130,246,0.5)] hover:shadow-[0_0_15px_rgba(59,130,246,0.5)] text-2xl bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                            placeholder="รหัสผ่านใหม่">
                    </div>
                    <div>
                        <p>ยืนยันรหัสผ่านใหม่</p>
                        <input name="ConfirmNewPw" type="password" required class="w-full focus:shadow-[0_0_15px_rgba(59,130,246,0.5)] hover:shadow-[0_0_15px_rgba(59,130,246,0.5)] text-2xl bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150"
                            placeholder="ยืนยันรหัสผ่านใหม่">
                        <?php if (!empty($data['message'])): ?>
                            <p class="text-red-500"><?= $data['message'] ?></p>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="text-2xl bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mb-2 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150">เปลี่ยนรหัสผ่าน</button>
                </form>
                <div class="flex justify-center">
                    <a href="/Account-detail" class="bg-gray-400 text-center text-white p-2 rounded-lg hover:shadow-md transition">ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
