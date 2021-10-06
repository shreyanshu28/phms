<?php
require_once '../../make-connection.php';
require_once '../model/city.php';
require_once '../model/user.php';

$user = new User();
$city = new City();
$result = $user->addUser('sanjana', ' ', 'patel', '2000-01-01', 'F', '9898008989', 'sanjana@san', 'sanju12345');
if($result){
    $result = $city->addCity('big bungalow', 'new road', 'Valsad', '396001', 'sanjana@san');
    if($result) {
        echo "record inserted";
    }
    else {
        echo "error";
    }
}
else {
    echo "userError";
}