<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "sipm_db";

 try {    
     //create PDO connection 
     $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
 } catch(PDOException $e) {
     //show error
     die("Terjadi masalah: " . $e->getMessage());
 }

// $con=mysqli_init(); 
// mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); 
// mysqli_real_connect($con, $db_host, $db_user, $db_pass, $db_name, 3306);