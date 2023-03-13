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
    <title>Login</title>
</head>
<body class="login-body">
<form action="actions/login.php" method="POST">
    <h5>Login</h5>
    <div class="input-field">
        <label for="">Email</label>
        <input type="text" name="email">
    </div>
    <div class="input-field">
        <label for="">Password</label>
        <input type="password" name="password">
    </div>
    <div class="error">
        <?php
            if(isset($_SESSION['error'])){?>
        <p><?php
            echo $_SESSION['error'];
            unset($_SESSION['error'])?></p>
        <?php }?>
    </div>
    <div class="input-field">
        <button type="submit" name="submit">Login</button>
    </div>
    <p>Dont have an account? Register<a href="register.php"> here</a></p>
</form>
<?php
?>
</body>
</html>