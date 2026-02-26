<?php
function getEventByUser(string $id): mysqli_result|bool
{
    global $conn;
    $sql = 'select * from events where create_by = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result; 

}

function insertEvent(array $data): int
{
    $conn = getConnection();

    $start_datetime = $data['start_date'] . ' ' . $data['start_time'] . ':00';
    $end_datetime   = $data['end_date'] . ' ' . $data['end_time'] . ':00';

    $sql = "INSERT INTO events 
            (title, description, attribute, start_date, end_date, location, max_user, create_by) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
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
    $uploadPath = __DIR__ . '/../public/uploads/';

    foreach ($files['tmp_name'] as $key => $tmpName) {
        $fileName = time() . '_' . basename($files['name'][$key]);
        move_uploaded_file($tmpName, $uploadPath . $fileName);

        $sql = "INSERT INTO event_images (event_id, image_path)
                VALUES (?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $eventId, $fileName);
        $stmt->execute();
    }
}

function getEventById(int $id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM events WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}



