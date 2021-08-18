<?php
session_start();
if (isset($_POST['btnSubmit'])) {
    $_SESSION['FName'] = $_POST['txtFName'];
    $_SESSION['MName'] = $_POST['txtMName'];
    $_SESSION['LName'] = $_POST['txtLName'];
    $_SESSION['ContactNo'] = $_POST['txtContactNo'];
    $_SESSION['Email'] = $_POST['txtEmail'];
    $_SESSION['Gender'] = $_POST['rbGender'];
    $_SESSION['Username'] = $_POST['txtUsername'];
    $_SESSION['Password'] = $_POST['txtPassword'];
    $_SESSION['ConfirmPassword'] = $_POST['txtConfirmPassword'];
    header("Location: ./home.php");
} else {
    echo "details remain(for testing)";
}
