<?php
declare(strict_types=1);

$hostname = 'localhost';
$dbName = 'webdev_final_database';
$username = 'user01';
$password = 'abcd1234';
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
require_once DATABASES_DIR . '/users.php';
require_once DATABASES_DIR . '/events.php';
require_once DATABASES_DIR . '/registrations.php';