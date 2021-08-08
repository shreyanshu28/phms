<?php
    // keep check-session on all user modules
    session_start();
    if($_SESSION['userKey'] == null){
        header("Location: ./login.php");
    }
?>