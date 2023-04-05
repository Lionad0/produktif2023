<?php
    session_start();

    if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }
    
    
    if(isset($_POST["login"])){
        $tableAdmin = 'admin';
        $conn = mysqli_connect("localhost", "root", "", "produktif");

        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $check = mysqli_query($conn, "SELECT * FROM $tableAdmin WHERE username = '$username'");

        if(mysqli_num_rows($check) === 1){
            $data = mysqli_fetch_assoc($check);
            if(password_verify($password, $data["password"])){
                $_SESSION["login"] = true;
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
        
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>LOGIN</h1>
                <label>Username</label>
                <input type="text" name="username" required>
                <label>Password</label>
                <input type="password" name="password" required>
                <button type="submit" name="login">LOGIN</button>
                <?php if(isset($error)) : ?>
                    <span style="color:red;">username / password salah bang!</span>
                <?php endif; ?>
        </form>
        <div class="hem">
            <a href="register.php">Sign Up</a><br>
            <a href="resetpass.php">Forgot Password</a>            
        </div>
    </div>
</body>
</html>

