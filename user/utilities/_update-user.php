<?php

use function PHPSTORM_META\type;

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
$Email= $_SESSION['Email'];
require_once __DIR__ . '/../../_make-connection.php';
if(isset($_POST["updateUser"])) {
    $FName = $_POST['txtFName'];    
    $MName= $_POST['txtMName'];
    $LName= $_POST['txtLName'];
    $ContactNo= $_POST['country-code'] . $_POST['txtContactNo'];
    $Gender= $_POST['rbGender'];
    $Address1= $_POST['txtAddress1'];

    // Address 2 is area
    $Address2= $_POST['txtAddress2'];

    // making sure which element is selected for city
    if (isset($_POST['txtCity'])) {
        $City= $_POST['txtCity'];
    } else {
        $City= $_POST['cbCity'];
    }

    $Pincode= $_POST['txtPincode'];

    // Making gender character uppercase
    
    try{
        $pdo->beginTransaction();
        $sql = "UPDATE tblUserMaster "
            ."SET firstName=:fname, middleName=:mname, lastName=:lname, contactNumber=:contactNo where email=:email"; 
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            'fname' =>$FName, 'mname'=>$MName, 'lname'=>$LName, 'contactNo' => $ContactNo, 'email' => $Email
        ]);

        if($result) {
            $sql = "UPDATE  tblUserAddress "
                ."SET addressline1=:Address1, addressline2=:Address2, city=:city, pincode=:pincode WHERE uid=(select uid from tblUserMaster where email=:email);";
            $stmt =$pdo->prepare($sql);
            $result = $stmt->execute([
                'Address1' => $Address1, 'Address2' => $Address2, 'city'=>$City, 'pincode'=>$Pincode, 'email'=>$Email
            ]);
        }
        
        $pdo->commit();
        header("location: /ProductionHouse/user/home.php");
    } catch(Exception $e){
        echo $e;
        $pdo -> rollBack();
    }
}