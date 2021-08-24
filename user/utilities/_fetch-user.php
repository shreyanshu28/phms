<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['Username'])) {
    header("Location: ../../index.php");
}

// TODO: need to remove u.uid column from the sql output
$sql = "SELECT u.*, ut.type, ua.addressline1, ua.addressline2, ua.landmark, c.cname, c.area, c.pincode FROM "
    . "tblLogin l INNER JOIN tblUser u "
    . "ON l.uid = u.uid "
    . "INNER JOIN tblUserType ut "
    . "ON u.utid = ut.tid "
    . "INNER JOIN tbluseraddress ua "
    . "ON ua.uid = u.uid "
    . "INNER JOIN tblcity c "
    . "ON c.cid = ua.cid "
    . "WHERE l.username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $_SESSION['Username']]);
$user = $stmt->fetchAll();

foreach ($user as $detail) {
    $_SESSION['FName'] = $detail->fname;
    $_SESSION['MName'] = $detail->mname;
    $_SESSION['LName'] = $detail->lname;
    $_SESSION['DOB'] = $detail->dob;
    $_SESSION['Gender'] = $detail->gender;
    $_SESSION['ContactNo'] = $detail->contactnumber;
    $_SESSION['Email'] = $detail->email;
    $_SESSION['Utype'] = $detail->type;
    $_SESSION['Address1'] = $detail->addressline1;
    $_SESSION['Address2'] = $detail->addressline2;
    $_SESSION['Landmark'] = $detail->landmark;
    $_SESSION['City'] = $detail->cname;
    $_SESSION['Area'] = $detail->area;
    $_SESSION['Pincode'] = $detail->pincode;
}
