<?php
function getEventByUser(string $id, string $search = ''): mysqli_result|bool
{
    global $conn;
    $sql = 'SELECT * FROM events WHERE create_by = ?';
    
    if (!empty($search)) {
        $sql .= " AND title LIKE ?";
    }
    
    $stmt = $conn->prepare($sql);
    
    if (!empty($search)) {
        $searchTerm = "%$search%";
        $stmt->bind_param('ss', $id, $searchTerm);
    } else {
        $stmt->bind_param('s', $id);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    return $result; 
}

//--------------------------------------------------------------------------------------------

function insertEvent(array $data): int
{
    $conn = getConnection();

    $start_datetime = $data['start_date'] . ' ' . $data['start_time'] . ':00';
    $end_datetime   = $data['end_date'] . ' ' . $data['end_time'] . ':00';

    $sql = "INSERT INTO events 
            (title, description, attribute, start_date, end_date, location, max_user, create_by) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    // ผูกค่าโดยใช้ $data['title'] ได้เลย
    $stmt->bind_param("ssssssii",
        $data['title'],
        $data['description'],
        $data['attribute'],
        $start_datetime,
        $end_datetime,
        $data['location'],
        $data['max_user'],
        $data['create_by']
    );

    $stmt->execute();
    return $conn->insert_id;
}

function insertEventImages(int $eventId, array $files): void
{
    $conn = getConnection();

    // 1. กำหนดโฟลเดอร์ที่จะเก็บไฟล์รูปภาพ (เก็บไว้ใน public/img/)
    $uploadDir = __DIR__ . '/../public/img/'; 
    
    // ถ้ายังไม่มีโฟลเดอร์ img ให้สร้างใหม่โดยอัตโนมัติ
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($files['tmp_name'] as $key => $tmpName) {
        if ($files['error'][$key] === UPLOAD_ERR_OK) {
            
            // 2. ดึงนามสกุลไฟล์ออกมา (เช่น jpg, png)
            $fileExtension = strtolower(pathinfo($files['name'][$key], PATHINFO_EXTENSION));
            
            // 3. สร้างชื่อไฟล์ใหม่แบบสุ่ม เพื่อป้องกันปัญหาคนอัปโหลดรูปชื่อซ้ำกัน
            $newFileName = uniqid('event_', true) . '.' . $fileExtension;
            
            // 4. พาทสำหรับเซฟไฟล์ลงเครื่องเซิร์ฟเวอร์
            $destination = $uploadDir . $newFileName;
            
            // 5. พาทสำหรับบันทึกลง Database (ตรงกับเงื่อนไข CHECK Constraint ที่เราทำไว้)
            $imagePath = 'img/' . $newFileName; 

            // 6. ทำการย้ายไฟล์จาก Temp ไปที่โฟลเดอร์ปลายทาง
            if (move_uploaded_file($tmpName, $destination)) {
                
                // 7. บันทึกข้อมูลลงตาราง event_images (ใช้แค่ event_id และ image_path)
                $sql = "INSERT INTO event_images (event_id, image_path) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is", $eventId, $imagePath);
                $stmt->execute();
                
            }
        }
    }
}


function getAllEvents($search = '', $startDate = '', $endDate = ''): array
{
    $conn = getConnection();
    $sql = "SELECT e.*, u.email as creator_email 
            FROM events e 
            LEFT JOIN users u ON e.create_by = u.user_id 
            WHERE 1=1"; 

    $params = [];
    $types = "";

    if (!empty($search)) {
        $sql .= " AND e.title LIKE ?";
        $params[] = "%$search%";
        $types .= "s";
    }

    // กรณีที่ 1: กรอกทั้งวันเริ่มและวันจบ (ค้นหาในช่วง)
    if (!empty($startDate) && !empty($endDate)) {
        $sql .= " AND e.start_date <= ? AND e.end_date >= ?";
        $params[] = $endDate . ' 23:59:59';
        $params[] = $startDate . ' 00:00:00';
        $types .= "ss";
    } 
    // กรณีที่ 2: กรอกแค่วันเริ่มวันเดียว (หางานที่เริ่มตั้งแต่วันนั้นเป็นต้นไป)
    else if (!empty($startDate)) {
        $sql .= " AND e.start_date >= ?";
        $params[] = $startDate . ' 00:00:00';
        $types .= "s";
    }
    // กรณีที่ 3: กรอกแค่วันจบวันเดียว (หางานที่มีก่อนหรือจบในวันนั้น)
    else if (!empty($endDate)) {
        $sql .= " AND e.end_date <= ?";
        $params[] = $endDate . ' 23:59:59';
        $types .= "s";
    }

    $sql .= " ORDER BY e.create_at DESC";
    
    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
    return $events;
}
function getEventImages(int $eventId): array {
    $conn = getConnection();
    $sql = "SELECT image_path FROM event_images WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['image_path'];
    }
    return $images;
}

// ฟังก์ชันดึงข้อมูลกิจกรรมรายตัวเพื่อนำไปแก้ไข
function getEventById(int $id): array|null {
    $conn = getConnection();
    $sql = "SELECT * FROM events WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
// ฟังก์ชันลบกิจกรรม (ตรวจสอบว่าเป็นเจ้าของกิจกรรมจริง)
// ไฟล์: databases/events.php
function deleteEvent(int $eventId, int $userId): bool {
    $conn = getConnection();
    
    // 1. ตรวจสอบสิทธิ์ก่อนว่าคนลบเป็นเจ้าของกิจกรรมจริงไหม
    $sqlCheck = "SELECT event_id FROM events WHERE event_id = ? AND create_by = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("ii", $eventId, $userId);
    $stmtCheck->execute();
    $resCheck = $stmtCheck->get_result();

    if ($resCheck->num_rows === 0) {
        return false; // ไม่ใช่เจ้าของกิจกรรม
    }

    // 2. ลบข้อมูลในตารางลูกที่อ้างอิงถึง event_id นี้ก่อน (ตามลำดับความสัมพันธ์)
    // ลบรูปภาพ
    $conn->query("DELETE FROM event_images WHERE event_id = $eventId");
    // ลบรหัส OTP
    $conn->query("DELETE FROM otps WHERE event_id = $eventId");
    // ลบการลงทะเบียน (ระวัง: หากต้องการเก็บประวัติอาจใช้วิธีเปลี่ยน Status แทน)
    $conn->query("DELETE FROM registrations WHERE event_id = $eventId");

    // 3. เมื่อลบข้อมูลที่เกี่ยวข้องหมดแล้ว จึงจะลบกิจกรรมหลักได้
    $sql = "DELETE FROM events WHERE event_id = ? AND create_by = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $eventId, $userId); 
    
    return $stmt->execute();
}
function deleteEventImage(int $eventId, string $imagePath): bool {
    $conn = getConnection();
    
    // 1. ลบไฟล์ออกจากโฟลเดอร์เซิร์ฟเวอร์ (เพื่อไม่ให้กินพื้นที่)
    $filePath = __DIR__ . '/../public/' . $imagePath;
    if (file_exists($filePath)) {
        unlink($filePath);
    }
    
    // 2. ลบข้อมูลพาทรูปภาพออกจากฐานข้อมูล
    $sql = "DELETE FROM event_images WHERE event_id = ? AND image_path = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $eventId, $imagePath);
    return $stmt->execute();
}

function updateEvent(int $eventId, array $data, int $userId): bool {
    $conn = getConnection();
    
    // รวมวันและเวลาเข้าด้วยกัน
    $start_datetime = $data['start_date'] . ' ' . $data['start_time'];
    $end_datetime   = $data['end_date'] . ' ' . $data['end_time'];

    $sql = "UPDATE events SET 
            title = ?, 
            description = ?, 
            attribute = ?, 
            location = ?, 
            start_date = ?, 
            end_date = ?, 
            max_user = ? 
            WHERE event_id = ? AND create_by = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssiii", 
        $data['title'], 
        $data['description'], 
        $data['attribute'], 
        $data['location'], 
        $start_datetime, 
        $end_datetime, 
        $data['max_user'], 
        $eventId, 
        $userId
    );

    return $stmt->execute();
}