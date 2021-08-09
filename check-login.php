<?php
    session_start();
    if($_POST['txtUsername'] == 'admin' && $_POST['txtPassword'] == 'adminadmin'){
        $_SESSION['userKey'] = $_POST['txtUsername'];
        header("Location: ./index.php");
    }else{
        header("Location: ./login.php");
    }
?>