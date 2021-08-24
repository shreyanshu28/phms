<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['btnSubmit'])) {

    // established connection to database
    include "../../_make-connection.php";

    // if someone trying to use make multiple accounts
    $user = [];
    $user['ContactNo'] = $_POST['country-code'] . "" . $_POST['txtContactNo'];
    $sql = "SELECT count(uid) FROM tblUser WHERE contactnumber = :contactno";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['contactno' => $user['ContactNo']]);
    $verifyUser = $stmt->fetchColumn();

    if ($verifyUser == "0") {
        $user['FName'] = $_POST['txtFName'];
        $user['MName'] = $_POST['txtMName'];
        $user['LName'] = $_POST['txtLName'];
        $user['dob'] = $_POST['dob'];

        // concate contactno to make 91 9283746282 as 919283746282 whole
        // number not able to concatenate
        $user['Email'] = $_POST['txtEmail'];
        $user['Gender'] = $_POST['rbGender'];
        $user['Address1'] = $_POST['txtAddress1'];

        // Address 2 is area
        $user['Address2'] = $_POST['txtAddress2'];

        // making sure which element is selected for city
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

        // $ad = new Address();
        // if($ad->isCity($user['City'], $user['Address2'])){

        // }

        // if city already exists
        // $sql = "SELECT cid FROM tblCity WHERE area = :area && pincode = :pincode";
        $city = strtoupper($user['City']);
        $sql = "SELECT count(cid) FROM tblCity WHERE pincode = :pincode && cname = :cname";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['pincode' => $user['Pincode'], 'cname' => $city]);
        // $stmt->execute(['area' => $user['Address2'], 'pincode' => $user['Pincode']]);
        $verifyCity = $stmt->fetchColumn();

        if ($verifyCity == "0") {
            if ($user['Address2'] == "") {
                $user['Address2'] = NULL;
            }
            $sql = "INSERT INTO tblCity"
                . "(cname, area, pincode) VALUES"
                . "(:cname, :area, :pincode)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['cname' => $city, 'area' => $user['Address2'], 'pincode' => $user['Pincode']]);
        }

        if ($verifyUser == "0") {
            // Making gender character uppercase
            $gender = strtoupper($user['Gender']);
            if ($gender == "MALE" || $gender == "FEMALE") {
                $gender = $gender[0];
            } else {
                // Default is M if null or bogus is passed
                $gender = 'M';
            }
            $sql = "INSERT INTO tbluser"
                . "(fname, mname, lname, dob, gender, contactnumber, email) VALUES"
                . "(:fname, :mname, :lname, :dob, :gender, :contactno, :email)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'fname' => $user['FName'], 'mname' => $user['MName'], 'lname' => $user['LName'],
                'dob' => $user['dob'], 'gender' => $gender, 'contactno' => $user['ContactNo'],
                'email' => $user['Email']
            ]);
        }

        $sql = "INSERT INTO tblUserAddress"
            . "(addressline1, addressline2, landmark, cid, uid) VALUES"
            . "(:addressline1, :addressline2, :landmark,"
            . "(select cid from tblCity where cname = :cname && pincode = :pincode),"
            . "(select uid from tblUser where contactnumber = :contactno))";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'addressline1' => $user['Address1'], 'addressline2' => $user['Address2'],
            'landmark' => $user['Landmark'], 'cname' => $user['City'], 'pincode' => $user['Pincode'], 'contactno' => $user['ContactNo']
        ]);

        // no same usernames
        $sql = "SELECT count(lid) FROM tblLogin WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $user['Username']]);
        $verifyLogin = $stmt->fetchColumn();

        if ($verifyLogin == "0") {
            $sql = "INSERT INTO tblLogin"
                . "(username, password, uid) VALUES"
                . "(:username, sha(:password),"
                . "(select uid from tblUser where contactnumber = :contactno))";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'username' => $user['Username'], 'password' => $user['Password'], 'contactno' => $user['ContactNo']
            ]);
        }
        header("Location: ../home.php");
    } else {
        header("Location: ../signup.php");
    }
} else {
    header("Location: ../../index.php");
}
