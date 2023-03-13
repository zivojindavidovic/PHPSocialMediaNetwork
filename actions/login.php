<?php

require_once ('database.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$stmt = $connection->prepare($sql);
$stmt->execute();

if($stmt->rowCount()){
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(password_verify($password, $result['password'])){
        if($result['active'] == 1){
            echo "Ulogovan";
        }else{
            echo "Visit your email to confirm your account";
        }
    }else{
        echo "Email or password incorrect email";
    }
}else{
    echo "Email or password incorrect email";
}