<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['Username'])) {
    header("Location: ../../index.php");
}

// TODO: need to remove u.uid column from the sql output
$sql = "SELECT u.* FROM"
    . " tblLogin l inner join tblUser u"
    . " on l.uid = u.uid"
    // only username needed after verification on check-login
    . " WHERE l.username = :username";

$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $_SESSION['Username']]);
$user = $stmt->fetchAll();

foreach ($user as $detail) {
    $_SESSION['FName'] = $detail->fname;
    $_SESSION['MName'] = $detail->mname;
    $_SESSION['LName'] = $detail->lname;
    $_SESSION['DOB'] = $detail->dob;
    $_SESSION['Gender'] = $detail->gender;
    $_SESSION['Gender'] = $detail->gender;
    $_SESSION['ContactNo'] = $detail->contactnumber;
    $_SESSION['Email'] = $detail->email;
}
