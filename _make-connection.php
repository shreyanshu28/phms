<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "production_house";

// $dns = "mysql:host=" . $host . ";dbname=" . $dbname;
// no space between equal signs in connection string
$dns = "mysql:host=${host};dbname=${dbname}";

try {
    $pdo = new PDO($dns, $user, $password);
} catch (Exception $e) {
    die("Database Not connected!");
}

// Default attribute for data fetching
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
