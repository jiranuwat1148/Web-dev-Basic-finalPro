<?php

$hostname = 'localhost';
$dbName = 'enrollment';
$username = 'demo01';
$password = 'demo123';
$conn = new mysqli($hostname, $username, $password, $dbName);

function getConnection(): mysqli
{
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// database functions ต่างๆ
require_once DATABASES_DIR . '/students.php';
require_once DATABASES_DIR . '/courses.php';
require_once DATABASES_DIR . '/enrollment.php';