<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// established connection to database
require_once __DIR__ . "/../../_make-connection.php";

// if someone trying to use make multiple accounts
$user = [];

$user["Email"] = $_SESSION["Email"];

if (isset($_SESSION['submit'])) {
    // $user['Email'] = $_POST['txtEmail'];

    $sql = "SELECT count(uid) FROM tblUserMaster WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $user['Email']]);
    $verifyUser = $stmt->fetchColumn();

    if ($verifyUser == "0") {
        if (!($_POST["txtPassword"] == $_POST["txtRePassword"])) {
            header("location: /ProductionHouse/user/login.php?pass=1");
        }
        $user['Password'] = $_POST['txtPassword'];
        $user['RePassword'] = $_POST['txtRePassword'];
        if ($user['Password'] == $user['RePassword']) {
            try {

                $user['FName'] = $_SESSION['fname'];
                $user['MName'] = $_SESSION['mname'];
                $user['LName'] = $_SESSION['lname'];
                $user['dob'] = $_SESSION['dob'];
                $user['ContactNo'] = $_SESSION['contactno'];
                $user['Gender'] = $_SESSION['gender'];
                $user['Address1'] = $_SESSION['address1'];

                // Address 2 is area
                $user['Address2'] = $_SESSION['address2'];

                // making sure which element is selected for city
                $user['City'] = $_SESSION['city'];

                $user['Pincode'] = $_SESSION['pincode'];

                // Making gender character uppercase
                $gender = $user['Gender'];
                $user["MName"] = $user["MName"] != "" ? $user["MName"] : NULL;

                $ROLE = 'Customer';
                $PHOTO_PATH = NULL;
                $STATUS = 1;

                $sql = "INSERT INTO tblUserMaster "
                    . "(firstName, middleName, lastName, dob, gender, contactNumber, email, password, role, profilePhoto, status) VALUES "
                    . "(:fname, :mname, :lname, :dob, :gender, :contactno, :email, :password, :role, :profilePhoto, :status)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([
                    'fname' => $user['FName'], 'mname' => $user['MName'], 'lname' => $user['LName'],
                    'dob' => $user['dob'], 'gender' => $gender, 'contactno' => $user['ContactNo'],
                    'email' => $user['Email'], 'password' => password_hash($user['Password'], PASSWORD_DEFAULT),
                    'role' => $ROLE, 'profilePhoto' => $PHOTO_PATH, 'status' => $STATUS
                ]);

                if ($result) {
                    $user['Address2'] = !isset($_SESSION["address2"]) ? $_SESSION["address2"] : null;
                    $sql = "INSERT INTO tblUserAddress "
                        . "(addressline1, addressline2, city, pincode, uid) VALUES "
                        . "(:addressline1, :addressline2, :city, :pincode, "
                        . "(select uid from tblUserMaster where email = :email))";
                    $stmt = $pdo->prepare($sql);
                    $result = $stmt->execute([
                        'addressline1' => $user['Address1'], 'addressline2' => $user['Address2'],
                        'city' => $user['City'], 'pincode' => $user['Pincode'], 'email' => $user['Email']
                    ]);
                    if ($result) {
                        // if login successfully created
                        $_SESSION['Email'] = $user['Email'];
                        header("Location: /ProductionHouse/user/home.php");
                    }
                }
            } catch (Exception $e) {
                setSessionValue($_SESSION);
                header("location: /ProductionHouse/user/signup.php?error=query");
            }
        } else {
            setSessionValue($_SESSION);
            header("location: /ProductionHouse/user/signup.php?error=pass");
        }
    } else {
        setSessionValue($_SESSION);
        header("location: /ProductionHouse/user/signup.php?error=user");
    }
} else {
    if (isset($_POST["create-pass"])) {
        if (!($_POST["txtPassword"] == $_POST["txtRePassword"])) {
            header("location: /ProductionHouse/user/login.php?pass=1");
        }

        $password = password_hash($_POST["txtPassword"], PASSWORD_DEFAULT);

        $sql = "UPDATE tblUserMaster SET password = :password WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute(["password" => $password, "email" => $user["Email"]]);

        if (!$result) {
            header("location: /ProductionHouse/user/login.php?pass=1");
        } else {
            header("location: /ProductionHouse/user/login.php?pass=0");
        }
    }
}


function setSessionValue($user)
{
    $_SESSION['fname'] = $user['txtFName'];
    $_SESSION['mname'] = $user['txtMName'];
    $_SESSION['lname'] = $user['txtLName'];
    $_SESSION['dob'] = $user['dob'];
    $_SESSION['contactno'] = $user['txtContactNo'];
    $_SESSION['gender'] = $user['rbGender'];
    $_SESSION['address1'] = $user['txtAddress1'];
    $_SESSION['address2'] = $user['txtAddress2'];
    $_SESSION['city'] = isset($user["cbCity"]) ? $user['cbCity'] : $user["txtCity"];
    $_SESSION['pincode'] = $user['txtPincode'];
}
