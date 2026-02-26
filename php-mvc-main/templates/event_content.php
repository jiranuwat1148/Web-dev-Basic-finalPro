<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>content</title>
</head>

<body class="    h-screen w-screen">
    <?php include 'navbar.php' ?>
    <div class="w-full h-full flex justify-center items-center rounded-lg overflow-hidden overflow-y-auto">
        <div class="w-1/2 h-[80%]  rounede-lg overflow-hidden overflow-y-auto no-scrollbar">
            <div class="w-full flex flex-col bg-white px-4 py-4 gap-4">
                <div class="w-full text-6xl font-bold">
                    Events
                </div>

                <div class="w-full flex justify-between items-center">
                    <div class="text-xl px-6 rounded-lg bg-gray-500 h-12 flex justify-center items-center text-white cursor-pointer hover:bg-gray-600 transition">
                        <a href="/create_content">Create Content</a>
                    </div>

                    <div class="w-1/2">
                        <form action="#" method="get" class="flex justify-end items-center gap-2">
                            <input type="text" class="w-full max-w-xs h-10 border-2 border-black rounded-lg px-2" placeholder="Search...">
                            <button type="submit" class="text-xl font-semibold hover:bg-blue-100 hover:rounded-lg px-4 py-1 transition">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full flex-1 px-4 py-4 overflow-y-auto space-y-4 no-scrollbar">
                    <!-- content here-->
            </div>
        </div>
    </div>
</body>

</html>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
</style>

 <script>
        function toggleDetail(id) {
            const element = document.getElementById(id);
            
            // เช็คว่าเปิดอยู่ไหม
            if (element.classList.contains('grid-rows-[0fr]')) {
                // ถ้าปิดอยู่ -> เปิด (1fr)
                element.classList.remove('grid-rows-[0fr]');
                element.classList.add('grid-rows-[1fr]');
            } else {
                // ถ้าเปิดอยู่ -> ปิด (0fr)
                element.classList.remove('grid-rows-[1fr]');
                element.classList.add('grid-rows-[0fr]');
            }
        }

    </script>
