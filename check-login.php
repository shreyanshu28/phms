<?php
session_start();
if ($_POST['txtUsername'] == 'admin' && $_POST['txtPassword'] == 'adminadmin') {
    $_SESSION['Username'] = $_POST['txtUsername'];
    header("Location: ./home.php");
} else {
    header("Location: ./login.php");
}
