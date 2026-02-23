<?php
unset($_SESSION['timestamp']);
unset($_SESSION['email']);
header('Location: /');
exit;
