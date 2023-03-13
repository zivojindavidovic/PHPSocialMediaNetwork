<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<form action="actions/login.php" method="POST">
    <div class="input-field">
        <label for="">Email</label>
        <input type="text" name="email">
    </div>
    <div class="input-field">
        <label for="">Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-field">
        <button type="submit" name="submit">Login</button>
    </div>
</form>
<p>Dont have an account? Register<a href="register.php"> here</a></p>
<?php
?>
</body>
</html>