<?php

require_once '../../make-connection.php';

class User extends DB {
    public function addUser($f_name, $m_name, $l_name, $dob, $gender, $contact_no, $email, $password) {
        $sql = "INSERT INTO tblUserMaster (firstName, middleName, lastName, dob, gender, contactNumber, email, password) VALUES (:fname, :mname, :lname, :dob, :gender, :contactno, :email, :password)";
        $cond = ['fname'=>$f_name, 'mname'=>$m_name, 'lname'=>$l_name, 'dob'=>$dob, 'gender'=>$gender, 'contactno'=>$contact_no, 'email'=>$email, 'password'=>password_hash($password, PASSWORD_DEFAULT)];
       return $this->update($sql, $cond);
    }
}

/*
ADDUSER TAKES ARGUMENTS FOR USERMASTER TABLE. DB->UPDATE'S RETURN VALUE WILL BE RETURNED TO THE CONTROLLER. IF THE VALUE IS APPROPRIATE, ADDRESS INFORMATION WILL BE ADDED. 
*/