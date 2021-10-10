<?php
// require_once '../../make-connection.php';
include __DIR__ . "./user.php";
// include __DIR__ . "/../../_make-connection.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = new User();
if (isset($_SESSION['newRole'])) {
    $result = $user->addNewRole($_SESSION['newRole']);
    unset($_SESSION['role']);
    header('location:./view-user.php');
} else if (isset($_SESSION['role'])) {
    $result = $user->updateRole($_SESSION['uid'], $_SESSION['role']);
    unset($_SESSION['role']);
    header('location:./view-user.php');
} else {
    $users = $user->selectAllUser();
    if ($users) {
        $role = $user->selectRole();
        $_SESSION['adminUsers'] = $users;
        $_SESSION['adminRole'] = $role;
    } else {
        echo "userError";
    }
}
