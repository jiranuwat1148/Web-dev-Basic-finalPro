<?php
function insertUsers($user): bool
{
    global $conn;
    $sql = 'insert into users (name, email, password, gender, birthday) VALUES (?,?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss',$user['name'], $user['email'], $user['password'], $user['gender'], $user['birthday']);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}