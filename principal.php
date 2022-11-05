<?php session_start();

    if(isset($_SESSION['usuario'])){
        require 'frontend/principal-vista.html';
    }else{
        header ('location: login.php');
    }
        
?>