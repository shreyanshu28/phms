<?php
// require_once '../../make-connection.php';
include __DIR__."./user.php";
// include __DIR__ . "/../../_make-connection.php";
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = new User();
$users = $user->selectAllUser();
if($users){
   $role = $user->selectRole();
   $_SESSION['adminUsers'] = $users;
   $_SESSION['adminRole'] = $role;
}
else {
    echo "userError";
}