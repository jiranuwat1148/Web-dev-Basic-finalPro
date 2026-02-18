<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
</head>

<body class="h-screen w-screen flex flex-col bg-gray-100">
    <?php include 'navbar.html' ?>

    <div class="flex flex-1 w-full h-full overflow-hidden mt-16">
        <!-- Sidebar / Profile Image -->
        <div class="w-1/4 h-full bg-white border-r border-gray-200 flex flex-col items-center pt-12 shadow-sm">
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-blue-500 shadow-lg">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUOmilg14nh-ZJQzEnTBXjSMX_6fQf0gVxZg&s" alt="Profile_Me" class="w-full h-full object-cover">
            </div>
            <h2 class="mt-4 text-2xl font-bold text-gray-800">User Name</h2>
            <p class="text-gray-500 text-sm">Member since 2024</p>

            <div class="mt-8 w-full px-6 space-y-2">
                <?php $page = isset($_POST['page']) ? $_POST['page']  : 'profile_info'; ?>
                <form action="" method="post" class="flex flex-col flex-1">

                    <button type="submit" name="subHis"
                        class="block w-full text-left px-4 py-3 rounded-lg font-medium transition duration-200 
                    <?php echo isset($_POST['subHis']) ? 'bg-blue-50 text-blue-600 shadow-sm border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-50'; ?>">
                        📜 Events History
                    </button>

                    <button type="submit" name="subEvent"
                        class="block w-full text-left px-4 py-3 rounded-lg font-medium transition duration-200 
                    <?php echo isset($_POST['subEvent']) ? 'bg-blue-50 text-blue-600 shadow-sm border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-50'; ?>">
                        📅 My Events
                    </button>

                    <button type="submit" name="subProfile"
                        class="block w-full text-left px-4 py-3 rounded-lg font-medium transition duration-200 
                    <?php echo (isset($_POST['subProfile']) || empty($_POST)) ? 'bg-blue-50 text-blue-600 shadow-sm border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-50'; ?>">
                        👤 Profile Info
                    </button>

                    <button type="submit" name="subChart"
                        class="block w-full text-left px-4 py-3 rounded-lg font-medium transition duration-200 
                    <?php echo isset($_POST['subChart']) ? 'bg-blue-50 text-blue-600 shadow-sm border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-50'; ?>">
                        📊 Chart
                    </button>

                </form>
            </div>

        </div>
        <div class="flex-1 flex flex-col justify-start items-center p-8 overflow-y-auto">
            <div class="w-full max-w-4xl flex flex-col justify-start items-center ">
                <?php
                if (isset($_POST['subHis'])) {
                    include __DIR__ . '/events-history.php';
                } else if (isset($_POST['subEvent'])) {
                    include __DIR__ . '/my-events.php';
                } else if (isset($_POST['subProfile'])) {
                    include __DIR__ . '/profile-info.php';
                } else if (isset($_POST['subChart'])) {
                    include __DIR__ . '/chart.html';
                } else {
                    include __DIR__ . '/profile-info.php';
                }
                ?>
            </div>
        </div>
</body>
</html>