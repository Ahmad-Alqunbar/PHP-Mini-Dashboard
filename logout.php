<?php
include 'connectDatabase.php';
include 'User.php';
$user = new User($conn);
$user->logout();
?>
