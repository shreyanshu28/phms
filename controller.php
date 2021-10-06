<?php
require_once './make-connection.php';

$DB = new DB();
$results = $DB -> select("select * from tblUserMaster where uid=:uid", ['uid'=>14]); 
echo json_encode(count($results)==0 ? null : $results);