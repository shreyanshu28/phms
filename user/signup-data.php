<?php
session_start();
if (isset($_POST['btnSubmit'])) {
    // established connection to database
    include "./../make-connection.php";

    $user = [];
    $user['FName'] = $_POST['txtFName'];
    $user['MName'] = $_POST['txtMName'];
    $user['LName'] = $_POST['txtLName'];
    $user['dob'] = $_POST['dob'];
    // concate contactno to make 91 9283746282 as 919283746282 whole
    // number not able to concatinate
    $user['ContactNo'] = $_POST['country-code'] . $_POST['txtContactNo'];
    $user['Email'] = $_POST['txtEmail'];
    $user['Gender'] = $_POST['rbGender'];
    $user['Address1'] = $_POST['txtAddress1'];
    $user['Address2'] = $_POST['txtAddress2'];
    if (isset($_POST['txtCity'])) {
        $user['City'] = $_POST['txtCity'];
    } else {
        $user['City'] = $_POST['cbCity'];
    }
    $user['Pincode'] = $_POST['txtPincode'];
    $user['Landmark'] = $_POST['txtLandmark'];
    $user['Username'] = $_POST['txtUsername'];
    $user['Password'] = $_POST['txtPassword'];
    $user['ConfirmPassword'] = $_POST['txtConfirmPassword'];

    $sql = "INSERT INTO tblCity"
        . "(cname, area, pincode) VALUES"
        . "(:cname, :area, :pincode)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['cname' => $user['City'], 'area' => $user['Address2'], 'pincode' => $user['Pincode']]);

    // Making gender character uppercase
    $gender = strtoupper($user['Gender'][0]);
    $sql = "INSERT INTO tbluser"
        . "(fname, mname, lname, dob, gender, contactnumber, email) VALUES"
        . "(:fname, :mname, :lname, :dob, :gender, :contactno, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'fname' => $user['FName'], 'mname' => $user['MName'], 'lname' => $user['LName'],
        'dob' => $user['dob'], 'gender' => $gender, 'contactno' => $user['ContactNo'],
        'email' => $user['Email']
    ]);

    $sql = "INSERT INTO tblUserAddress"
        . "(addressline1, addressline2, landmark, cid, uid) VALUES"
        . "(:addressline1, :addressline2, :landmark,"
        . "(select cid from tblCity where cname = :cname && area = :area),"
        . "(select uid from tblUser where contactnumber = :contactno))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'addressline1' => $user['Address1'], 'addressline2' => $user['Address2'],
        'landmark' => $user['Landmark'], 'cname' => $user['City'], 'area' => $user['Address2'], 'contactno' => $user['ContactNo']
    ]);

    $sql = "INSERT INTO tblLogin"
        . "(username, password, uid) VALUES"
        . "(:username, :password,"
        . "(select uid from tblUser where contactnumber = :contactno))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'username' => $user['Username'], 'password' => $user['Password'], 'contactno' => $user['ContactNo']
    ]);

    header("Location: ./home.php");
} else {
    echo "details remain(for testing)";
}
