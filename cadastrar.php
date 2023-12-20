<?php
include("config.php");
session_start();

//Pega os dados do formulario
$nome =  mysqli_real_escape_string($conn, $_POST['nome']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha =  mysqli_real_escape_string($conn, $_POST['senha']);
$senhaConfirm = mysqli_real_escape_string($conn, $_POST['senhaConfirm']);

// Criptografa a senha usando MD5
$senhaMD5 = md5($senha);

//Verifica se existe algum campo nulo e da insert no banco,caso contrario manda pra tela de login
if (!empty($nome) && !empty($senha) && $senha == $senhaConfirm) {
    
    $sql = "INSERT INTO tbusuario (`nome`, `email`, `senha`) VALUES('$nome', '$email', '$senhaMD5')";
    $resultado =  mysqli_query($conn, $sql);

    if (mysqli_error($conn)) {
        
        echo "<script> alert('erro ao inserir no banco!'); </script>";
    } else {
        echo "<script> alert('Show de bola!'); </script>";
       
       
    }
} else {
    echo "<script> alert('Impossivel realizar cadastro!'); </script>";
    if(!empty($_SESSION)){
        header("refresh:1; url=pageCadastroLogado.php");
    }else{
        header("refresh:1; url=pageCadastro.php");
    }
   
}
