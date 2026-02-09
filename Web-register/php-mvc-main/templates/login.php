<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login i here</title>
</head>

<body class="h-screen w-screen bg-black ">
  <div class="flex flex-col items-center justify-start h-full w-full">
    <?php include 'navbar.html' ?>
    <div class="flex flex-col items-center justify-center h-full w-full">
      <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6 h-[70%]">
        <h2 class="text-6xl font-bold text-gray-900 mb-4 text-center mt-8">เข้าสู่ระบบ</h2>
        <form class="flex flex-col gap-8 mt-20">
          <input type="email" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="ชื่อผูใช้งานหรืออีเมล">
          <input type="password" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="ใส่อีเมล">
          <div class="flex items-center justify-between flex-wrap">
            <label for="remember-me" class="text-sm text-gray-900 cursor-pointer">
            </label>
            <a href="#" class="text-xl text-blue-500 hover:underline mt-4">ลืมรหัสใช่?หรือไม่คลิกสิ</a>
            <p class="text-gray-900 mt-4"> ไม่มีบัญชีใช่หรือไม่? <a href="#" class="text-md text-blue-500 -200 hover:underline mt-4">ลงทะเบียน</a></p>
          </div>
          <button type="submit" class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150">เข้าสู่ระบบ</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>