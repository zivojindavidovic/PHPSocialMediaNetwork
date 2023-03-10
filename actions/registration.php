<?php
session_start();

echo $_POST['first_name'];
require ('UserValidation.php');

$data = $_POST;

$validate = new UserValidation($data);

$errors = $validate->validateForm();

if(!empty($errors)){
    $_SESSION['email_error'] = $errors['email'];
    $_SESSION['first_name_error'] = $errors['first_name'];
    $_SESSION['last_name_error'] = $errors['last_name'];
    $_SESSION['rPassword_error'] = $errors['rPassword'];
    $_SESSION['password_error'] = $errors['password'];
    $_SESSION['username_error'] = $errors['username'];

    $firstname = $_POST['first_name'];
    $_SESSION['firstname'] = $firstname;
    header('location: ../register.php');
}else{

}