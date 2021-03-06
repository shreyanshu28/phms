<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['Email'])) {
    header("Location: /ProductionHouse/user/login.php");
}

try {
    include __DIR__ . "/../../_make-connection.php";
    // TODO: need to remove u.uid column from the sql output
    // error for kushal@gmail.com but not for kuga@gmail.com
    // SELECT u.uid, u.firstName, u.middleName, u.lastName, u.dob, u.gender, u.contactNumber, u.email, u.profilePhoto, u.status, ua.addressline1, ua.addressline2, ua.city, ua.pincode FROM tblUserMaster u INNER JOIN tblUserAddress ua ON u.uid = ua.uid WHERE email = 'kushal@gmail.com';

    $sql = "SELECT u.uid, u.firstName, u.middleName, u.lastName, u.dob, u.gender, u.contactNumber, u.email, u.profilePhoto, u.status, u.role,"
        . "ua.addressline1, ua.addressline2, ua.city, ua.pincode FROM "
        . "tblUserMaster u INNER JOIN tblUserAddress ua "
        . "ON ua.uid = u.uid "
        . "WHERE email = :email";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(["email" => $_SESSION["Email"]]);
    $user = $stmt->fetchAll();
    $_SESSION['user'] = $user;
    foreach ($user as $detail) {
        $_SESSION['Uid'] = $detail->uid;
        $_SESSION['FName'] = $detail->firstName;
        $_SESSION['MName'] = $detail->middleName;
        $_SESSION['LName'] = $detail->lastName;
        $_SESSION['DOB'] = $detail->dob;
        $_SESSION['Gender'] = $detail->gender;
        $_SESSION['ContactNo'] = $detail->contactNumber;
        $_SESSION['Email'] = $detail->email;
        $_SESSION['Path_ProfilePhoto'] = $detail->profilePhoto;
        $_SESSION['Status'] = $detail->status;
        $_SESSION['Address1'] = $detail->addressline1;
        $_SESSION['Address2'] = $detail->addressline2;
        $_SESSION['City'] = $detail->city;
        $_SESSION['Pincode'] = $detail->pincode;
        $_SESSION['Role'] = strtoupper($detail->role)[0];
    }
} catch (Exception $e) {
    echo $e;
}
