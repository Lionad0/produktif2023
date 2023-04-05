<?php 
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    

    require 'function.php';

    if(isset($_GET["id"])){
        delete($_GET["id"]);
    }else{
        header("Location: index.php");
    }
    

    
    
?>
