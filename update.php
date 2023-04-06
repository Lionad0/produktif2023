<?php 
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    

    require 'function.php';

    $id = $_GET["id"];
    $query = "SELECT * FROM users WHERE id = $id";
    $data = query($query)[0];


    if(isset($_POST["submit"])){
        update($_POST, $id);  
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>UPDATING</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="container">
            <form action="" method="post">
                <h1>UPDATE DATA</h1>
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?= $data["nama"];?>" required>                        
                    <label for="nama">Alamat</label>
                    <input type="text" name="alamat" value="<?= $data["alamat"];?>" required>
                    <button type="submit" name="submit" class="general-button">Ubah Data</button>   
                </form>
                <a href="index.php">Back</a>                 
        </div>
    </body>
</html>