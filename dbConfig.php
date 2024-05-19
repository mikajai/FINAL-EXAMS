<?php 

// Connection variables
$host = "localhost";
$user = "root";
$password = "";

// PhpMyAdmin Current database name
$dbname = "Finals_Order_System";
$dsn = "mysql:host={$host};dbname={$dbname}";

$conn = new PDO($dsn, $user, $password);
$conn->exec("SET time_zone = '+08:00';");

?>