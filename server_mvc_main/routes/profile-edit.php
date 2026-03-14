<?php
$email = $_SESSION['email'];
$result = getUsersByEmail($email);
if (isset($_POST['re'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = [
            'id' => $result['user_id'],
            'name' => !empty(trim($_POST['name']))
                ? trim($_POST['name'])
                : $result['name'],
            'gender' => !empty($_POST['gender'])
                ? $_POST['gender']
                : $result['gender'],
            'birthday' => !empty($_POST['birthday']) ? $_POST['birthday'] : "2000-01-15"
        ];
        EditUsers($user);
        renderView('account-detail');
    } else {
        renderView('account-detail');
    }
} else {
    renderView('account-detail');
}
