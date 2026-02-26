<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = getUsersByEmail($_SESSION['email']);
    $user_id = $user['user_id'];
    $event_id = $_POST['event_id'];

    if (!isJoined($user_id, $event_id)) {
        joinEvent($user_id, $event_id);
    }

    header("Location: /event_content");
    exit;
}
