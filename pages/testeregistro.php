<?php

    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['senha']))
    {
        include_once('../config.php');
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];

        $validarCpf = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
        $resultV = $conexao->query($validarCpf);
        
        if(mysqli_num_rows($resultV) > 0 ){
            // print_r("nao existe");
            // header('location: registro.html');
            echo "Ooops este CPF ja esta em uso,é obrigatorio usar o seu CPF";
            
        }else{
            $sql = "INSERT INTO usuarios VALUES ('id_user', '$nome','$cpf','10000.00', '$senha')";
            $result = $conexao->query($sql);
            echo "<script>alert('criado com sucesso')</script>";
            header('location: login.php');
            
        }        
        // print_r($result);    
    }else{
        header('location: registro.html');
        
    }

?> 