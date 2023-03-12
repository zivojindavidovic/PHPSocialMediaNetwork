<?php

$servername = "localhost";
$username = "id20438030_root";
$password = "j5Xb%t&3F0*qAuHa";

try{
    $connection = new PDO("mysql:host=$servername;dbname=id20438030_phpsmn", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $ex){
    echo "Connection failed: " . $ex->getMessage();
}