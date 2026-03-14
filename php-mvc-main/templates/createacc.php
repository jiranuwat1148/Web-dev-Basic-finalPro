<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acctivity - Dashboard</title>
</head>

<body class="min-h-screen flex flex-col bg-gray-50">

<?php include 'navbar.php' ?>

<div class="flex-1 flex justify-center items-start md:items-center px-4 py-6 mt-10">

  <div class="w-full max-w-md md:max-w-2xl bg-white shadow-lg rounded-2xl p-6 md:p-10">

    <!-- Title -->
    <div class="text-center mb-6 md:mb-8">
      <h1 class="text-2xl md:text-4xl font-bold text-gray-800">
        Create Account
      </h1>
      <p class="text-gray-500 text-sm md:text-lg mt-2">
        สร้างบัญชีของคุณเพื่อเข้าใช้งานระบบกิจกรรมของเรา
      </p>
    </div>

    <!-- Form -->
    <form class="flex flex-col gap-4 md:gap-5" action="createAcc" method="post">

      <!-- Name -->
      <div>
        <label class="text-sm md:text-base font-semibold text-gray-700">
          ชื่อ-นามสกุล
        </label>
        <input
        class="w-full mt-1 h-10 md:h-12 px-3 md:px-4 border border-gray-300 rounded-lg
        focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
        placeholder="ใส่ชื่อที่นี่"
        type="text"
        name="Uname"
        required>
      </div>

      <!-- Gender -->
      <div>
        <label class="text-sm md:text-base font-semibold text-gray-700">
          เพศ
        </label>
        <select
        name="gender"
        class="w-full mt-1 h-10 md:h-12 px-3 md:px-4 border border-gray-300 rounded-lg
        focus:ring-2 focus:ring-blue-500 focus:outline-none">
          <option value="ชาย">ชาย</option>
          <option value="หญิง">หญิง</option>
        </select>
      </div>

      <!-- Birthday -->
      <div>
        <label class="text-sm md:text-base font-semibold text-gray-700">
          วันเกิด
        </label>
        <input
        type="date"
        name="birthday"
        class="w-full mt-1 h-10 md:h-12 px-3 md:px-4 border border-gray-300 rounded-lg
        focus:ring-2 focus:ring-blue-500 focus:outline-none"
        required>
      </div>

      <!-- Email -->
      <div>
        <label class="text-sm md:text-base font-semibold text-gray-700">
          อีเมล
        </label>
        <input
        class="w-full mt-1 h-10 md:h-12 px-3 md:px-4 border border-gray-300 rounded-lg
        focus:ring-2 focus:ring-blue-500 focus:outline-none"
        placeholder="ใส่อีเมลที่นี่"
        type="email"
        name="email"
        required>
      </div>

      <!-- Password -->
      <div>
        <label class="text-sm md:text-base font-semibold text-gray-700">
          รหัสผ่าน
        </label>
        <input
        class="w-full mt-1 h-10 md:h-12 px-3 md:px-4 border border-gray-300 rounded-lg
        focus:ring-2 focus:ring-blue-500 focus:outline-none"
        placeholder="สร้างรหัสผ่าน"
        type="password"
        name="password"
        required>
      </div>

      <!-- Confirm Password -->
      <div>
        <label class="text-sm md:text-base font-semibold text-gray-700">
          ยืนยันรหัสผ่าน
        </label>
        <input
        class="w-full mt-1 h-10 md:h-12 px-3 md:px-4 border border-gray-300 rounded-lg
        focus:ring-2 focus:ring-blue-500 focus:outline-none"
        placeholder="ใส่รหัสผ่านอีกครั้ง"
        type="password"
        name="Cpassword"
        required>
      </div>

      <?php if (!empty($data['error'])): ?>
        <p class="text-red-500 text-sm"><?= $data['error'] ?></p>
      <?php endif; ?>

      <!-- Button -->
      <button
      class="mt-2 h-10 md:h-12 bg-blue-500 text-white rounded-lg
      hover:bg-blue-600 transition font-semibold">
        ยืนยันการลงทะเบียน
      </button>

    </form>

  </div>

</div>

</body>

</html>