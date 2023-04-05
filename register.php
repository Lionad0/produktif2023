<?php 
    require 'function.php';

    if(isset($_POST["register"])){
        if(register($_POST) > 0){
            echo "<script>alert('user berhasil ditambahkan')</script>";
            header("Location: login.php");
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>Register</h1>
                <label>Username</label>
                <input type="text" name="username" required>
                <label>Email</label>
                <input type="email" name="email" required>
                <label>Password</label>
                <input type="password" name="password" required>
                <label>Confirm password</label>
                <input type="password" name="password2" required>
                <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
</html>

