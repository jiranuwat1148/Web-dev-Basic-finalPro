<?php
$reg_event = getRegisByEvent($data['Event'], 'confirmed');
$reg_eventPending = getRegisByEvent($data['Event'], 'pending');
$count = getNumberRegisByEvent($data['Event'], 'confirmed');
?>
<script>
    let male = 0;
    let female = 0;
    let Infant = 0;
    let Preschool_age = 0;
    let School_age = 0;
    let Teenager = 0;
    let Adult = 0;
    let Elderly = 0;
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>register</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">
    <?php include 'navbar.php' ?>
    <div class="w-1/2 h-full mx-auto p-10 space-y-5">
        <div class="mt-10 ">
            <a class="bg-gray-600 text-center text-white p-2 rounded-lg hover:shadow-md transition " href="/account-detail">ย้อนกลับ</a>
        </div>
        <div class="bg-white relative h-[50%] w-full p-4 shadow-lg rounded-2xl">
            <div class="flex justify-evenly relative h-[80%]">
                <div>
                    <h2 class="text-xl font-bold">เพศ</h2>
                    <canvas id="doughnutChart"></canvas>
                </div>
                <div>
                    <h2 class="text-xl font-bold">ช่วงอายุ</h2>
                    <canvas class="pb-5" id="barChart"></canvas>
                </div>
            </div>
            <div class="mt-10">
                <h2 class="text-xl font-bold">จำนวนผู้เข้าร่วม : <?= $count ?></h2>
            </div>
        </div>

        <!-- ตารางบน -->
        <div class="bg-white shadow-lg rounded-2xl p-6">
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
                                    <td class="border px-4 py-2"><?= $user->name ?></td>
                                    <td class="border px-4 py-2"><?= $user->gender ?></td>
                                    <td class="border px-4 py-2"><?= $age ?></td>
                                </tr>
                                <script>
                                    if ("<?= $user->gender ?>" == "ชาย") {
                                        male++;
                                    } else {
                                        female++;
                                    }
                                    if (<?= $age ?> <= 3) {
                                        Infant++;
                                    } else if (<?= $age ?> <= 6) {
                                        Preschool_age++;
                                    } else if (<?= $age ?> <= 12) {
                                        School_age++;
                                    } else if (<?= $age ?> <= 20) {
                                        Teenager++;
                                    } else if (<?= $age ?> <= 60) {
                                        Adult++;
                                    } else {
                                        Elderly++;
                                    }
                                </script>
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
                                    <td class="border px-4 py-2"><?= $user->name ?></td>
                                    <td class="border px-4 py-2"><?= $user->gender ?></td>
                                    <td class="border px-4 py-2"><?= $age ?></td>
                                    <td class="border px-4 py-2">
                                        <form method="post" action="registation_event">
                                            <input type="hidden" name="event_id" value="<?= $data['Event'] ?>">
                                            <button onclick="return confirmSubmission()" name="Decline" type="submit" value="<?= $row->reg_id ?>">❌</button>
                                            <button onclick="return confirmSubmission()" name="confirmed" type="submit" value="<?= $row->reg_id ?>">✅</button>
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
            <script>
                function confirmSubmission() {
                    return confirm("ต้องการอนุมัติหรือไม่ ?");
                }
            </script>

            <script>
                // --- กราฟที่ 1: Bar Chart ---
                const ctxBar = document.getElementById('barChart');

                new Chart(ctxBar, {
                    type: 'bar', // ประเภทกราฟ: bar, line, pie, doughnut
                    data: {
                        labels: ['0-3', '3-6', '6-12', '12-20', '20-60', '60 ขึ้นไป'], // แกน X
                        datasets: [{
                            label: 'จำนวนคนตามอายุ',
                            data: [Infant, Preschool_age, School_age, Teenager, Adult, Elderly], // ข้อมูลตัวเลข
                            backgroundColor: [
                                'rgba(59, 130, 246, 0.6)', // สีแท่ง (Tailwind Blue-500)
                            ],
                            borderColor: [
                                'rgba(59, 130, 246, 1)',
                            ],
                            borderWidth: 1,
                            borderRadius: 5 // มุมมนของแท่ง
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false, // ให้ยืดตามกล่องแม่
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // --- กราฟที่ 2: Doughnut Chart ---
                const ctxDoughnut = document.getElementById('doughnutChart');

                new Chart(ctxDoughnut, {
                    type: 'doughnut',
                    data: {
                        labels: ['ชาย', 'หญิง'],
                        datasets: [{
                            label: 'จำนวนคน',
                            data: [male, female],
                            backgroundColor: [
                                'rgba(17, 0, 255, 0.73)',
                                'rgba(255, 0, 0, 0.75)',
                            ],
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            </script>
</body>

</html>
