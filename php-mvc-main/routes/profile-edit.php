<?php
$email = $_SESSION['email'];
$result = getUsersByEmail($email);
if (isset($_POST['re'])) {
    // update
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = [
            'id' => $result['user_id'],
            'name' => !empty(trim($_POST['name']))
                ? trim($_POST['name'])
                : $result['name'],
            'gender' => !empty($_POST['gender'])
                ? $_POST['gender']
                : $result['gender'],
            'birthday' => !empty($_POST['birthday'])
                ? $_POST['birthday']
                : $result['birthday']
        ];
        EditUsers($user);
        renderView('Account-detail');
    } else {
        renderView('Account-detail');
    }
} else {
    renderView('Account-detail');
}
