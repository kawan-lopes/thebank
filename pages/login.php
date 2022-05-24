<?php
    session_start();
    if(isset($_POST['sair'])){
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
    }
    // print_r($_SESSION);
    if((isset($_SESSION['cpf']) == true) and (isset($_SESSION['senha']) == true)){
        header('location: ../index.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="../img/logo.svg" alt="">
        </div>
    </header>
    <main>
        <div class="esquerda">
            <img src="../img/porquinho.svg" alt="">
        </div>
        <div class="direita">
            <div class="container">
                <h1>Login</h1>
                <a href="./registro.html">Quero criar uma conta</a>
                <p>Faça login para verificar seu saldo e fazer tranferencias.</p>
                <form action="testelogin.php" method="post">
                    <input class="input" type="text" name="cpf" placeholder="Digite seu CPF">
                    <input class="input" type="password" name="senha" placeholder="Digite sua senha">
                    <input class="btn" type="submit" name="submit" value="Entrar">
                </form>
            </div>
        </div>
    </main>
</body>

</html>