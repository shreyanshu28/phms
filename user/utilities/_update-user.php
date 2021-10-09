<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$Email = $_SESSION['Email'];

require_once __DIR__ . '/../../_make-connection.php';

if (isset($_POST["updateUser"])) {
    $reg_alpha = "/[a-zA-Z]+/";
    $reg_num = "/^[6-9][0-9]{9}$/";

    if (!preg_match($reg_alpha, $_POST["txtFName"])) {
        header("location: /ProductionHouse/user/signup.php?error=fname");
    }

    if (!preg_match($reg_alpha, $_POST["txtMName"])) {
        header("location: ../user-detail?error=mname");
    }

    if (!preg_match($reg_alpha, $_POST["txtLName"])) {
        header("location: ../user-detail?error=lname");
    }

    if (!preg_match($reg_num, $_POST["txtContactNo"])) {
        header("location: ../user-detail?error=no");
    }

    $y = explode("-", $_POST["dob"]);
    if (!($y[0] <= (date("Y") - 18))) {
        header("location: ../user-detail?error=dob");
    }

    if (isset($_POST['txtAddress1'])) {
        if ($_POST['txtAddress1'] == "") {
            header("location: ../user-detail?error=address");
        }
    }

    if (isset($_POST['txtCity'])) {
        if ($_POST["txtCity"] == -1) {
            header("location: ./signup.php/error=incity");
        }
        if (!preg_match($reg_alpha, $_POST["txtCity"])) {
            header("location: ../user-detail?error=city");
        }
    } else {
        if (!preg_match($reg_alpha, $_POST["cbCity"])) {
            header("location: ../user-detail?error=city");
        }
    }

    if (!preg_match("/^[0-9]{6}$/", $_POST["txtPincode"])) {
        header("location: ../user-detail?error=pincode");
    }

    $_SESSION['fname'] = $_POST['txtFName'];
    $_SESSION['mname'] = $_POST['txtMName'];
    $_SESSION['lname'] = $_POST['txtLName'];
    $_SESSION['dob'] = $_POST['dob'];
    $_SESSION['contactno'] = $_POST['country-code'] . $_POST['txtContactNo'];
    $gender = strtoupper($_POST["rbGender"]);
    $_SESSION['gender'] = $gender == "MALE" || $gender == "FEMALE"  ? $gender[0] : "M";
    $_SESSION['address1'] = $_POST['txtAddress1'];
    $_SESSION['address2'] = isset($_POST['txtAddress2']) ? $_POST["txtAddress2"] : "";

    $_SESSION['city'] = isset($_POST["txtCity"]) ? $_POST['txtCity'] : $_POST["cbCity"];
    $_SESSION['pincode'] = $_POST['txtPincode'];

    $FName = $_POST['txtFName'];
    $MName = $_POST['txtMName'];
    $LName = $_POST['txtLName'];
    $ContactNo = $_POST['country-code'] . $_POST['txtContactNo'];
    $Gender = $_POST['rbGender'];
    $Address1 = $_POST['txtAddress1'];

    // Address 2 is area
    $Address2 = $_POST['txtAddress2'];

    // making sure which element is selected for city
    if (isset($_POST['txtCity'])) {
        $City = $_POST['txtCity'];
    } else {
        $City = $_POST['cbCity'];
    }

    $Pincode = $_POST['txtPincode'];

    // Making gender character uppercase

    try {
        $pdo->beginTransaction();
        $sql = "UPDATE tblUserMaster "
            . "SET firstName=:fname, middleName=:mname, lastName=:lname, contactNumber=:contactNo where email=:email";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            'fname' => $FName, 'mname' => $MName, 'lname' => $LName, 'contactNo' => $ContactNo, 'email' => $Email
        ]);

        if ($result) {
            $sql = "UPDATE  tblUserAddress "
                . "SET addressline1=:Address1, addressline2=:Address2, city=:city, pincode=:pincode WHERE uid=(select uid from tblUserMaster where email=:email);";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                'Address1' => $Address1, 'Address2' => $Address2, 'city' => $City, 'pincode' => $Pincode, 'email' => $Email
            ]);
        }

        $pdo->commit();
        header("location: /ProductionHouse/user/home.php");
    } catch (Exception $e) {
        echo $e;
        $pdo->rollBack();
    }
}
