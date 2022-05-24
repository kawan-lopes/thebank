<?php
    session_start();
    print_r($_SESSION);
    if((!isset($_SESSION['cpf']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
        header('location: login.php');
    }
    $logado = $_SESSION['cpf'];
?>