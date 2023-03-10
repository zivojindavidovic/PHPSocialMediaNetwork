<?php

//

class UserValidation
{
    private $data;
    private $errors = [];
    private static $fields = ['first_name', 'last_name', 'username', 'password', 'repeat_password','email'];
    public function __construct($data){
        $this->data = $data;
    }
    
    public function validateForm(){
        foreach (self::$fields as $field) {
            if(!array_key_exists($field, $this->data)){
                trigger_error("$field doesnt exist!");
                return;
            }
            $this->validateEmail();
            $this->validateBasicInput();
            $this->validatePassword();
            $this->validateUsername();
            return $this->errors;
        }
    }

    private function validateBasicInput(){
        $firstname = trim($this->data['first_name']);
        $lastname = trim($this->data['last_name']);
        if(empty($firstname)){
            $this->addError('first_name', 'First name cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z]{6,12}$/', $firstname)){
                $this->addError('first_name', 'First name must contains 6-12 letters');
            }
        }
        if(empty($lastname)){
            $this->addError('last_name', 'Last name cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z]{6,12}$/', $lastname)){
                $this->addError('last_name', 'First name must contains 6-12 letters');
            }
        }
    }

    private function validateEmail(){
        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError('email', 'Email cannot be empty');
        }else{
            if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'Enter a valid Email address!');
            }
        }
    }

    private function validatePassword(){
        $password = trim($this->data['password']);
        $rPassword = trim($this->data['repeat_password']);

        if(empty($password) || empty($rPassword)){
            $this->addError('password', 'Password or repeat password cannot be empty');
        }else{
            if(strlen($password) < 7){
                $this->addError('password', 'Password needs to be 7+ characters');
            }else{
                if($password !== $rPassword){
                    $this->addError('rPassword', 'Your password do not match');
                }
            }
        }
    }

    private function validateUsername(){
        $val = trim($this->data['username']);
        if(empty($val)){
            $this->addError('username', 'Username cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
                $this->addError('username', 'Username must be at least 6 alphanumeric characters');
            }
        }
    }

    private function addError($key, $val){
        $this->errors[$key] = $val;
    }
    
}