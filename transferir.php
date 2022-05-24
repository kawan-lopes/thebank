<?php

    include_once('./config.php');
    session_start();
    if(isset($_POST['transferir'])){
        $chave = $_POST['chave'];
        $valor = $_POST['valor'];

        $senha = $_POST['senha'];

        $validarChave = $conexao->query("SELECT * FROM usuarios WHERE id_user = '$chave'");

        
        if(mysqli_num_rows($validarChave) > 0 ){
            // print_r("nao existe");
            if($_SESSION['senha'] == $senha){
                //  echo "é igual";
                $saldo = $conexao->query( "SELECT saldo FROM usuarios WHERE id_user = '$chave'");
                $saldo = mysqli_fetch_array($saldo);
                $novoSaldo = $saldo[0] + $valor;


                $sql = "UPDATE usuarios SET saldo=$novoSaldo WHERE id_user=$chave;";
                $result = $conexao->query($sql);


                $cpf = $_SESSION['cpf'];
                $meuSaldo = $conexao->query( "SELECT saldo FROM usuarios WHERE cpf = $cpf");
                $meuSaldo = mysqli_fetch_array($meuSaldo);
                if($meuSaldo[0] < $valor){
                    echo "Transferencia invalida,saldo insuficiente.";
                }else{
                    $novoMeuSaldo = $meuSaldo[0] - $valor;
                    $sql = "UPDATE usuarios SET saldo=$novoMeuSaldo WHERE cpf=$cpf;";
                    $result = $conexao->query($sql);
                    header('location: index.php');
                }
                


                




            }else{
                echo"sua senha esta incorreta";
            }
        }else{
            echo "esta conta nao existe";
        };
            
    }
        
        
?>

