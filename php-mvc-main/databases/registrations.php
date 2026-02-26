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