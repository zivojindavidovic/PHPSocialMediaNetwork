<?php

session_start();

if(empty($_GET['token']) || empty($_GET['email'])){
    header("location: ../register.php");
}

if(empty($_SESSION['token'])){
    $_SESSION['message'] = "Your token has been expired";
    header('location: ../register.php');
}

$token = $_GET['token'];
$email = $_GET['email'];

if($_SESSION['token'] === $token){
    require ('database.php');
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $connection->query($sql);
    if(empty($result)){
        $_SESSION['message'] = "No such a user!";
        header("location: ../register.php");
    }

    $updateSql = "UPDATE users SET active = 1 WHERE email = '$email'";
    if($connection->query($updateSql)){
        $_SESSION['message'] = "You have been successfully confirmed your account";
        echo "<a href='../index.php'>Login</a>";
        unset($_SESSION['token']);
    }
}else{
    $_SESSION['message'] = "Your token has been expired";
    header('location: ../register.php');
}