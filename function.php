<?php  
    
    $conn = mysqli_connect("localhost", "root", "", "produktif");    
    $tableAdmin = "admin";

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        
        return $rows;
    }
    
    function create($data){
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        
        $query = "INSERT INTO users VALUES ('', '$nama', '$alamat')";
        mysqli_query($conn, $query);
    
        // if(mysqli_affected_rows($conn) > 0){
        //     echo "<script>alert('data berhasil ditambahkan')</script>";
        // }


        header("Location: index.php");
    }

    function delete($id){
        global $conn;
        $query = "DELETE FROM users WHERE id = $id";

        mysqli_query($conn, $query);
        header("Location: index.php");
    }
 
    function update($data, $id){
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);

        $query = "UPDATE users SET
                nama = '$nama',
                alamat = '$alamat'
                WHERE id = $id
        ";

        mysqli_query($conn, $query);
        header("Location: index.php");
    }

    function register($data){
        global $conn;
        global $tableAdmin;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $email = $data["email"];
        
        if($password !== $password2){
            echo "<script> alert('konfirmasi password tidak sesuai') </script>";
            return false;
        }

        $check = mysqli_query($conn, "SELECT username FROM $tableAdmin WHERE username = '$username'");

        if(mysqli_fetch_assoc($check)){
            echo "<script> alert('username sudah dimiliki') </script>";
            return false; 
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO $tableAdmin VALUES ('', '$username', '$password', '$email')");
        

        return mysqli_affected_rows($conn);

    }
?>