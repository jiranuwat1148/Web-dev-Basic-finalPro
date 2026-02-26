<?php
function getRegisByUser(string $id): mysqli_result|bool
{
    global $conn;
    $sql = 'select * from registrations,events where registrations.event_id = events.event_id and user_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result; 
}

function getRegisByEvent(string $event,string $status): mysqli_result|bool
{
    global $conn;
    $sql = 'select * from registrations,events where registrations.event_id = events.event_id and events.event_id = ? and registrations.status = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('is', $event,$status);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result; 
}

function updateRegis(int $id, string $status): bool
{
    global $conn;
    $sql = 'update registrations set status = ? where reg_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $id);
    $stmt->execute();
    return  $stmt->affected_rows > 0;
}

function joinEvent(string $user_id, int $event_id): bool
{
    global $conn;

    $sql = "INSERT INTO registrations (user_id, event_id, status) VALUES (?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $user_id, $event_id);

    return $stmt->execute();
}

function isJoined(string $user_id, int $event_id): bool
{
    global $conn;

    $sql = "SELECT * FROM registrations WHERE user_id = ? AND event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $user_id, $event_id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->num_rows > 0;
}
