 <?php
    session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['cpf']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
        header('location: ./pages/login.php');
    }
    $logado = $_SESSION['cpf'];
    include_once('./config.php');



    $saldo = $conexao->query( "SELECT saldo FROM usuarios WHERE cpf = '$logado'");
    $strsaldo = mysqli_fetch_array($saldo);
    $strsaldo = number_format($strsaldo[0],2,",",".");

    $nome = $conexao->query( "SELECT nome FROM usuarios WHERE cpf = '$logado'");
    $strnome = mysqli_fetch_array($nome);

    $conta = $conexao->query( "SELECT id_user FROM usuarios WHERE cpf = '$logado'");
    $strconta = mysqli_fetch_array($conta);
    // $strsaldo[0] = $strsaldo[0] - 59.55;






    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>The Bank</title>
</head>

<body>
    <div class="esquerda">
        <div class="perfil">
            <?php echo("<h1>{$strnome[0]}</h1>"); ?>

            <div class="circulo"></div>
        </div>

        <div class="menu">
            <h1 class="active">Home</h1>
            <h1>Configuraçoes</h1>
            <form action="./pages/login.php" method="post">
                <input class="btnSair" type="submit" name="sair" value="sair">
            </form>
        </div>
    </div>


    <div class="direito">
        <div class="topo">
            <div class="topo-esquerda">
                <img src="./img/logo.svg" alt="">
                <!-- <p>Conta: 0001</p> -->
                <?php echo("<p>conta: {$strconta[0]}</p>"); ?>
            </div>
            <div class="topo-direita">
                <h1>Saldo disponivel</h1>
                <?php echo("<p>R\${$strsaldo}</p>"); ?>

                <!-- <p>10.000,00</p> -->
            </div>
        </div>
        <div class="bottom">
            <h1>Tela de Transferencia</h1>
            <form action="transferir.php" method="post">
                <label for="chave">Chave da conta para qual deseja fazer a transferencia</label>
                <input class="grande" type="text" name="chave" placeholder="Digite a chave da conta que deseja fazer a transferencia">
                <label for="valor">Valor que deseja transferir</label>
                <input class="pequeno" type="text" name="valor" placeholder="Valor">
                <label for="senha">Senha para confirmar o envio</label>
                <input class="grande" type="password" name="senha" placeholder="Confirme sua senha">
                <input class="btn" name="transferir" type="submit" value="Tranferir">  
            </form>
                
            
        </div>
        
    </div>
</body>

</html>