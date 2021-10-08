<?php
if (isset($_POST["btnSubmit"])) {

    header("location: /ProductionHouse/user/get-otp.php");
} else {
    header("location: /ProductionHouse/user/login.php");
}
