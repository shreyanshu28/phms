<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// established connection to database
require_once __DIR__ . "/../../_make-connection.php";

// if someone trying to use make multiple accounts
$user = [];

$user["Email"] = $_SESSION["Email"];

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
} else {
    if (isset($_SESSION['signup'])) {
        // $user['Email'] = $_POST['txtEmail'];

        $sql = "SELECT count(uid) FROM tblUserMaster WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $user['Email']]);
        $verifyUser = $stmt->fetchColumn();

        if ($verifyUser == "0") {
            $user['Password'] = $_POST['txtPassword'];
            $user['ConfirmPassword'] = $_POST['txtConfirmPassword'];
            if ($user['Password'] == $user['ConfirmPassword']) {
                try {
                    // $reg_alpha = "/[a-zEA-Z]+/";
                    // $reg_num = "/[0-9]+/";
                    // if (!preg_match($reg_alpha, $_POST["txtFName"])) {
                    //     header("location: /ProductionHouse/user/signup.php?error=fname");
                    // }

                    // if (!preg_match($reg_alphs, $_POST["txtMName"])) {
                    //     header("location: /ProductionHouse/user/signup.php?error=lname");
                    // }

                    // if (!preg_match($reg_alpha, $_POST["txtLName"])) {
                    //     header("location: /ProductionHouse/user/signup.php?error=lname");
                    // }

                    // if (!preg_match($reg_num, $_POST["txtContactNo"])) {
                    // }

                    // if (!isset($_POST["txtAddress1"])) {
                    // }

                    // if (isset($_POST['txtCity'])) {
                    //     if (!preg_match($reg_alpha, $_POST["txtCity"])) {
                    //     }
                    // } else {
                    //     if (!preg_match($reg_alpha, $_POST["cbCity"])) {
                    //     }
                    // }

                    // if (!preg_match("[0-9]{6}", $_POST["txtPincode"])) {
                    // }

                    $user['FName'] = $_POST['txtFName'];
                    $user['MName'] = $_POST['txtMName'];
                    $user['LName'] = $_POST['txtLName'];
                    $user['dob'] = $_POST['dob'];
                    $user['ContactNo'] = $_POST['country-code'] . $_POST['txtContactNo'];
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

                // Making gender character uppercase
                $gender = strtoupper($user['Gender']);
                $gender = $gender == "MALE" || $gender == "FEMALE" ? $gender[0] : 'M';
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
                    setSessionValue($_POST);
                    header("location: /ProductionHouse/user/signup.php?error=query");
                }
            } else {
                setSessionValue($_POST);
                header("location: /ProductionHouse/user/signup.php?error=pass");
            }
        } else {
            setSessionValue($_POST);
            header("location: /ProductionHouse/user/signup.php?error=user");
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
