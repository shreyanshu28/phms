<?php
    session_start();
    if($_SESSION['userKey'] == null){
        header("Location: ./../login.php");
    }
?>