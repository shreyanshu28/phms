<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "production_house";

// $dns = "mysql:host=" . $host . ";dbname=" . $dbname;
// no space between equal signs in connection string
$dns = "mysql:host=${host};dbname=${dbname}";

$pdo = new PDO($dns, $user, $password);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
