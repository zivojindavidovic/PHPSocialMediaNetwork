<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
    header("location: welcome.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Registration</title>
</head>
<body class="login-body">
<form action="actions/registration.php" method="POST" class="register-form">
    <h5>Registration</h5>
    <div class="input-field">
        <label for="">First name</label>
        <input type="text" class="input-field" name="first_name">
    </div>
    <div class="error">
        <?php
        if(isset($_SESSION['first_name_error'])){
            echo $_SESSION['first_name_error'];
        }
        unset($_SESSION['first_name_error']);
        ?>
    </div>
    <div class="input-field">
        <label for="">Last name</label>
        <input type="text" class="input-field" name="last_name">
    </div>
    <div class="error">
        <?php
        if(isset($_SESSION['last_name_error'])){
            echo $_SESSION['last_name_error'];
        }
        unset($_SESSION['last_name_error']);
        ?>
    </div>
    <div class="input-field">
        <label for="">Email</label>
        <input type="text" class="input-field" name="email">
    </div>
    <div class="error">
        <?php
            if(isset($_SESSION['email_error_error'])){
                echo $_SESSION['email_error_error'];
            }
            unset($_SESSION['email_error_error']);
        ?>
    </div>
    <div class="input-field">
        <label for="">Username</label>
        <input type="text" class="input-field" name="username">
    </div>
    <div class="error">
        <?php
        if(isset($_SESSION['username_error'])){
            echo $_SESSION['username_error'];
        }
        unset($_SESSION['username_error']);
        ?>
    </div>
    <div class="input-field">
        <label for="">Password</label>
        <input type="password" class="input-field" name="password">
    </div>
    <div class="error">
        <?php
        if(isset($_SESSION['password_error'])){
            echo $_SESSION['password_error'];
        }
        unset($_SESSION['password_error']);
        ?>
    </div>
    <div class="input-field">
        <label for="">Repeat password</label>
        <input type="password" class="input-field" name="repeat_password">
    </div>
    <div class="error">
        <?php
        if(isset($_SESSION['rPassword_error'])){
            echo $_SESSION['rPassword_error'];
        }
        unset($_SESSION['rPassword_error']);
        ?>
    </div>
    <div class="input-field">
        <button type="submit" name="submit">Register</button>
    </div>
    <div class="confirmation">
        <?php
        if(isset($_SESSION['message'])){
            ?>
        <p><?php echo $_SESSION['message'];
        unset($_SESSION['message'])?></p>
        <?php
        }
        ?>
    </div>
    <p>Already have an account? Register <a>here</a></p>
</form>
</body>
</html>