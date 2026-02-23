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