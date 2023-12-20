<?php
// Inicialize a sessão
session_start();
 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem vindo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; background-color: gray}
    </style>
</head>
<body>
    <h1 class="my-5">Olá, <!--<b><?php //echo htmlspecialchars($_SESSION["nome"]); ?>--></b>bem-vindo ao menu.</h1>
    <p>
        <a href="api.php" class="btn btn-light" style="background-color: green; color: #f5f5f5">Ver o tempo</a>
        <a href="tare.php" class="btn btn-light" style="background-color: blue; color: #f5f5f5">Adicionar uma tarefa</a>     
        <a href="reset-password.php" class="btn btn-light" style="background-color: gold; color: #f5f5f5">Redefina sua senha</a>
        <a href="usu.php" class="btn btn-light" style="background-color: red; color: #f5f5f5">Gerenciar usuário</a>
    </p>
</body>
</html>