<?php
session_start();
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
    header('location: ../register.php');
}else{
    require_once ('database.php');
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $accountActive = 0;

    $query = "INSERT INTO users (firstname, lastname, email, username, password, active) VALUES('$firstname', '$lastname', '$email', '$username', '$password', '$accountActive')";

    if($connection->query($query)){
        $_SESSION['token'] = hash('sha256', uniqid());

        $message = sprintf("Hi %s, Please confirm registration https://phpsmn.000webhostapp.com/actions/confirm.php?%s", $username, http_build_query([
            'token' => $_SESSION['token'],
            'email' => $email
        ]));
        $headers = "From: zivojin.2001davidovic@gmail.com";
        mail($email, 'User Registration Confirmation', $message, $headers);
        $_SESSION['message'] = 'You registered successfully. Please check your email in order to confirm your account.';
        header('location: ../register.php');
    }
}