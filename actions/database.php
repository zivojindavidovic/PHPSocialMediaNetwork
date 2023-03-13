<?php

$servername = "localhost";
$username = "id20438030_root";
$password = "j5Xb%t&3F0*qAuHa";
$username1 = "root";
$password1 = "";
$dbname = "id20438030_phpsmn";

try{
    $connection = new PDO("mysql:host=$servername;dbname=phpsmn", $username1, $password1);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $ex){
    echo "Connection failed: " . $ex->getMessage();
}