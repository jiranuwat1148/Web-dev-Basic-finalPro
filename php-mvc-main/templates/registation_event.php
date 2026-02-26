<?php
$reg_event = getRegisByEvent(1, 'confirmed');
$reg_eventPending = getRegisByEvent(1, 'pending');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>register</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navbar.php' ?>
    <div class="w-1/2 h-full mx-auto p-10 space-y-10">

        <!-- ตารางบน -->
        <div class="bg-white shadow-lg rounded-2xl p-6 mt-10">
            <h2 class="text-xl font-bold mb-4">รายชื่อผู้เข้าร่วม</h2>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-4 py-2">ลำดับ</th>
                            <th class="border px-4 py-2">ชื่อ</th>
                            <th class="border px-4 py-2">เพศ</th>
                            <th class="border px-4 py-2">อายุ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        if ($reg_event->num_rows > 0) {
                            while ($row = $reg_event->fetch_object()) {
                                $info = getUsersById($row->user_id);
                                $user = $info->fetch_object();
                                $today = date("Y-m-d");
                                $diff = date_diff(date_create($user->birthday), date_create($today));
                                $age = $diff->y
                        ?>
                                <tr class="text-center">
                                    <td class="border px-4 py-2"><?= $i ?></td>
                                    <td class="border px-4 py-2"><?= $user->NAME ?></td>
                                    <td class="border px-4 py-2"><?= $user->gender ?></td>
                                    <td class="border px-4 py-2"><?= $age ?></td>
                                </tr>
                            <?php
                                $i++;
                            }
                        } else { ?>
                            <tr class="text-center">
                                <td colspan="4" class="border px-4 py-2">ไม่มีรายชื่อ</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ตารางล่าง -->
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-xl font-bold mb-4">รายชื่อผู้ขอเข้าร่วม</h2>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-4 py-2">ลำดับ</th>
                            <th class="border px-4 py-2">ชื่อ</th>
                            <th class="border px-4 py-2">เพศ</th>
                            <th class="border px-4 py-2">อายุ</th>
                            <th class="border px-4 py-2">การอนุมัติ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        if ($reg_eventPending->num_rows > 0) {
                            while ($row = $reg_eventPending->fetch_object()) {
                                $info = getUsersById($row->user_id);
                                $user = $info->fetch_object();
                                $today = date("Y-m-d");
                                $diff = date_diff(date_create($user->birthday), date_create($today));
                                $age = $diff->y
                        ?>
                                <tr class="text-center">
                                    <td class="border px-4 py-2"><?= $i ?></td>
                                    <td class="border px-4 py-2"><?= $user->NAME ?></td>
                                    <td class="border px-4 py-2"><?= $user->gender ?></td>
                                    <td class="border px-4 py-2"><?= $age ?></td>
                                    <td class="border px-4 py-2">
                                        <form method="post" action="registation_event">
                                            <button onclick="return confirmSubmission()" name="Decline" type="submit" value="<?= $row -> reg_id ?>">❌</button>
                                            <button onclick="return confirmSubmission()" name="confirmed" type="submit" value="<?= $row -> reg_id ?>">✅</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            }
                        } else { ?>
                            <tr class="text-center">
                                <td colspan="5" class="border px-4 py-2">ไม่มีรายชื่อ</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        function confirmSubmission() {
            return confirm("ต้องการอนุมัติหรือไม่ ?");
        }
    </script>
</body>

</html>