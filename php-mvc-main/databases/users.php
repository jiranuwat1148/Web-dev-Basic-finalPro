<?php
function insertUsers($user): bool
{
    global $conn;
    $sql = 'insert into users (name, email, password) VALUES (?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $user['name'], $user['email'], $user['password']);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function checkLogin(string $email, string $password): bool
{
    global $conn;
    $sql = 'select password from users where email = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return password_verify($password, $row['password']);
    }
    return false;
}
