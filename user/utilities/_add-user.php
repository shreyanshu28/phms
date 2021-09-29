<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['btnSubmit'])) {

    // established connection to database
    require_once __DIR__ . "/../../_make-connection.php";

    // if someone trying to use make multiple accounts
    $user = [];
    $user['Email'] = $_POST['txtEmail'];

    $sql = "SELECT count(uid) FROM tblUserMaster WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $user['Email']]);
    $verifyUser = $stmt->fetchColumn();

    if ($verifyUser == "0") {
        $user['Password'] = $_POST['txtPassword'];
        $user['ConfirmPassword'] = $_POST['txtConfirmPassword'];
        if ($user['Password'] == $user['ConfirmPassword']) {
            try {
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

                $ROLE = 'C';
                $PHOTO_PATH = NULL;
                $STATUS = 1;

                $sql = "INSERT INTO tblUserMaster "
                    . "(firstName, middleName, lastName, dob, gender, contactNumber, email, password, role, profilePhoto, status) VALUES "
                    . "(:fname, :mname, :lname, :dob, :gender, :contactno, :email, :password, :role, :profilePhoto, :status)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'fname' => $user['FName'], 'mname' => $user['MName'], 'lname' => $user['LName'],
                    'dob' => $user['dob'], 'gender' => $gender, 'contactno' => $user['ContactNo'],
                    'email' => $user['Email'], 'password' => $user['Password'],
                    'role' => $ROLE, 'profilePhoto' => $PHOTO_PATH, 'status' => $STATUS
                ]);

                $sql = "INSERT INTO tblUserAddress "
                    . "(addressline1, addressline2, city, pincode, uid) VALUES "
                    . "(:addressline1, :addressline2, :city, :pincode, "
                    . "(select uid from tblUserMaster where email = :email))";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'addressline1' => $user['Address1'], 'addressline2' => $user['Address2'],
                    'cname' => $user['City'], 'pincode' => $user['Pincode'], 'email' => $user['Email']
                ]);

                // if login successfully created
                $_SESSION['Email'] = $user['Email'];
                header("Location: /ProductionHouse/user/home.php");
            } catch (Exception $e) {
                echo $e;
            }
        } else {
            header("location: /ProductionHouse/user/signup.php?error=pass");
        }
    } else {
        header("location: /ProductionHouse/user/signup.php?error=user");
    }
}
