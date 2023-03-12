<?php

session_start();

if(empty($_SESSION['token'])){
    $_SESSION['message'] = "Your token has been expired";
    header('location: ../register.php');
}