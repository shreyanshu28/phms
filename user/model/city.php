<?php
/*
THIS EXISTS AT THE SAME LEVEL OF USER CLASS. THE EMAIL WILL BE SENT FROM THE CONTROLLER FOR SEEMLESS EXPERIENCE BETWEEN USER AND CITY CLASS.
*/

class City extends DB{
    public function addCity($address1, $address2, $city, $pincode, $email){
        $sql = "INSERT INTO tblUserAddress (addressline1, addressline2, city, pincode, uid) VALUES (:addressline1, :addressline2, :city, :pincode, (select uid from tblUserMaster where email = :email))";
        $cond = ['addressline1'=>$address1, 'addressline2'=>$address2, 'city'=>$city, 'pincode'=>$pincode, 'email'=>$email];
        return $this->update($sql, $cond);
    }
}