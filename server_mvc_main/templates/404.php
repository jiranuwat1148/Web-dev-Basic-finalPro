<!DOCTYPE html>
<html lang="en">
<head>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR 404</title>
</head>
<body>
    <div class="min-h-screen bg-[#0a0a0a] flex items-center justify-center px-4 overflow-hidden relative">
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-[120px] animate-pulse"></div>
  <div class="absolute top-1/4 right-1/4 w-[300px] h-[300px] bg-blue-600/10 rounded-full blur-[100px]"></div>

  <div class="relative z-10 text-center">
    <h1 class="text-[12rem] md:text-[18rem] font-black leading-none tracking-tighter">
      <span class="bg-clip-text text-transparent bg-gradient-to-b from-white via-white/50 to-transparent opacity-20">
        404
      </span>
    </h1>

    <div class="-mt-20 md:-mt-32">
      <h2 class="text-4xl md:text-6xl font-bold text-white mb-4 tracking-tight">
        404  PAGE NOT FOUND <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">ERROR</span>
      </h2>
      <p class="text-gray-400 text-lg md:text-xl max-w-md mx-auto mb-10 font-light">
        ขออภัยครับ ความรักที่คุณตามหา ไม่มีอยู่จริง
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
        <a href="/" class="group relative px-8 py-3.5 font-bold text-white transition-all duration-300">
          <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-purple-600 to-blue-600 rounded-full blur-sm group-hover:blur-md transition-all"></span>
          <span class="relative bg-[#0a0a0a] px-8 py-3 rounded-full block border border-white/10 group-hover:border-white/40 transition-all">
            กลับไปรักตัวเอง
          </span>
        </a>
        
        <button onclick="history.back()" class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          กลับไปดูแลใจตัวเอง
        </button>
      </div>
    </div>
  </div>

  <div class="absolute top-10 left-10 w-1 h-1 bg-white rounded-full animate-ping"></div>
  <div class="absolute bottom-20 right-20 w-1 h-1 bg-white rounded-full animate-pulse"></div>
  <div class="absolute top-1/3 right-10 w-1 h-1 bg-purple-500 rounded-full animate-ping [animation-delay:1s]"></div>
</div>
    
</body>
</html>