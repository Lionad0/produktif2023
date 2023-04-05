<?php 
    session_start();
   
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    

    require 'function.php';
    $datas = query("SELECT * FROM users");
    $nomor = 1;
    
    

    if(isset($_GET["logout"])){
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();

        header("Location: login.php");
        exit;
    }
   
    if(isset($_POST["submit"])){
        create($_POST);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=, initial-scale=1.0">     
        <title>Web Bang</title>
        <link rel="stylesheet" href="css/setail.css">
    </head>
    <body>
        <div class="bigger-container">
            <div class="dahlah"></div>

            <div class="control-data">
                <button class="show-form general-button" >Tambah Data</button>
                <a href="index.php?logout=true" class="general-button">Log out</a>
            </div>
    
            <div class="form">
                <form action="" method="post">
                    <div class="data">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" required>                        
                    </div>
    
                    <div class="data">
                        <label for="nama">Alamat</label>
                        <input type="text" name="alamat" required>
                    </div>
                        
                    <button type="submit" name="submit" class="general-button">Tambah Data</button>
                    <button type="button" class="remove red">Batal</button>
    
                </form> 
    
            </div> 

           
    
            <div class="container">
                <div class="table">
                    <table border="1" cellpadding="20" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>action</th>
                        </tr>
                    <?php foreach($datas as $data) : ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data["nama"]; ?></td>
                            <td><?php echo $data["alamat"]; ?></td>
                            <td><a class="red" href="delete.php?id=<?= $data["id"]?>">hapus</a> | <a class="general-button" href="update.php?id=<?= $data["id"]?>">ubah</a></td>
                        </tr>
                    <?php endforeach; ?>
                        
                    </table>
                </div>
            </div>

        </div>

        <script src="script.js"></script>
    </body>
</html>