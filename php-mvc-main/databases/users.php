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

function EditUsers($user)
{
    try{
        global $conn;
        $sql = 'update users SET name = ?,gender = ?,birthday = ? where user_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $user['name'], $user['gender'], $user['birthday'],$user['id']);
        $stmt->execute();
        $conn->commit();
    }
    catch (Exception $e) {
        $conn->rollback(); // rollback
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
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

function getUsersByEmail(string $email): ?array
{
    global $conn;
    $sql = 'select * from users where email = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc(); 
}

function updateUserPassword(int $id, string $hashed_password): bool
{
    global $conn;
    $sql = 'update Users set password = ? where user_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $hashed_password, $id);
    $stmt->execute();
    return  $stmt->affected_rows > 0;
}

function checkEmail(string $email): bool
{
    global $conn;
    $sql = 'SELECT email FROM users WHERE email = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}