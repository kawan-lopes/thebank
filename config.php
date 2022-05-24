<?php
$server   = "localhost";
$user     = "root";
$password = "";
$database = "thebank";

$conexao = new mysqli($server,$user,$password,$database);

// if($conexao->connect_errno)
// {
//     echo "Erro ao conectar";
// } 
// else
// {
//     echo "pagina de usuarios";
// }
?>
