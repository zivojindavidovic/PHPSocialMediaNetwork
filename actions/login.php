<?php
session_start();
require_once ('database.php');
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $_SESSION['logged_in'] = FALSE;

    if($stmt->rowCount()){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $result['password'])){
            if($result['active'] == 1){
                $_SESSION['logged_in'] = TRUE;
                $_SESSION['username'] = $result['username'];
                $_SESSION['firstname'] = $result['firstname'];
                $_SESSION['lastname'] = $result['lastname'];
                $_SESSION['email'] = $result['email'];

                header('location: ../welcome.php');
            }else{
                $_SESSION['error'] = "Your entered wrong email or password";
                header('location: ../index.php');
            }
        }else{
            $_SESSION['error'] = "Your entered wrong email or password";
            header('location: ../index.php');
        }
    }else{
        $_SESSION['error'] = "Your entered wrong email or password";
        header('location: ../index.php');
    }
}