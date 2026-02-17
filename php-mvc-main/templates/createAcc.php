<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acctivity - Dashboard</title>
</head>

<body class="w-full h-screen flex flex-col overflow-hidden m-0">
  <?php include 'navbar.html' ?>
  <div class="w-full xl:w-[full] flex-1 flex flex-col md:flex md:justify-center md:items-center">
    <div class="w-full h-[5%] md:w-[1/2] flex justify-center items-center">
    </div>
    <div class="md:w-[80%] md:h-[70%] flex justify-start items-start flex-row px-4 bg-gray-100 rounded-lg">
      <div class="w-full h-[60%] flex flex-col justify-start items-start py-4 px-4 md:w-1/2">
        <form class="text-2xl w-full flex flex-col mt-8" action="##" method="post">
          <label class="mt-4" for="Uname">Name</label>
          <input class="hover:shadow-[0_0_20px_rgba(59,130,246,0.5)] focus:shadow-[0_0_20px_rgba(59,130,246,0.5)] border-1 shadow-xl border-gray-200 h-12 items-center px-4 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="ใส่ชื่อที่นี่" type="text" id="Uname" name="Uname">
          <label class="mt-4" for="Uname">Password</label>
          <input class="hover:shadow-[0_0_20px_rgba(59,130,246,0.5)] focus:shadow-[0_0_20px_rgba(59,130,246,0.5)] border-1 shadow-xl border-gray-200 h-12 items-center px-4 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="สร้างรหัสผ่าน" type="password" id="pw" name="pw">
          <label class="mt-4" for="Uname">Confirm Password</label>
          <input class="hover:shadow-[0_0_20px_rgba(59,130,246,0.5)] focus:shadow-[0_0_20px_rgba(59,130,246,0.5)] border-1 shadow-xl border-gray-200 h-12 items-center px-4 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" placeholder="ใส่รหัสผ่านอีกครั้ง" type="password" id="Cpw" name="Cpw">
          <div class="w-full h-24 mt-4 flex justify-start items-start flex-col">
            <label for="confirmCookie">ยอมรับข้อตกลงการใช้งาน <a class="text-lg text-blue-500 hover:underline " href="termservice.html" target="_blank" rel="noopener noreferrer">อ่านข้อตกลง<input class="w-4 h-4 mt-3 mx-4 hover:shadow-[0_0_20px_rgba(0,0,0,0.5)]" type="checkbox" name="confirmCookie" id="confirmCookie"></a></label>
            <div class="w-full h-full flex flex-col justify-start items-center">
              <button class="mt-4 w-full h-12 border-1 bg-blue-200 rounded-lg hover:shadow-[0_0_20px_rgba(100,100,300,0.5)]" type="submit">ยืนยันการลงทะเบียน</button>
            </div>
          </div>

      </div>
      <div class="w-full h-full flex justify-center items-center flex-col xl:w-1/2">
        <H1 class="text-4xl xl:text-7xl md:text-4xl  my-4">Create Account</H1>
        <p class="md:text-2xl">สร้างบัญชีของคุณเพื่อเข้าใช้งานระบบกิจกรรมของเรา</p>
        <div class="h-[70%] flex justify-center items-center  ">
            พื้นที่ โฆษณา
      </div>
      </div>
      </form>
    </div>
  </div>

</body>

</html>