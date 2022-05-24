<?php 

// print_r($_REQUEST)
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['cpf']) && !empty($_POST['senha']))
    {
        include_once('../config.php');
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];


        $sql = "SELECT * FROM usuarios WHERE cpf = '$cpf' and senha = '$senha'";
        $result = $conexao->query($sql);
        // print_r($result);
        if(mysqli_num_rows($result) <1 ){
            // print_r("nao existe");
            echo"Seus dados de usuario estao errados";
        }else{
            $_SESSION['cpf'] = $cpf;
            $_SESSION['senha'] = $senha;
            print_r("existe");
            header('location: ../index.php');
        }



        
    }else{
        
    }

?>