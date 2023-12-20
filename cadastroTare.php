<?php
session_start();
include("config.php");


//Pega os dados do formulario
$titulo =  mysqli_real_escape_string($conn, $_POST['titulo']);
$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
$data =  mysqli_real_escape_string($conn, $_POST['dateT']);
$id = $_SESSION['idUsu'];

//Verifica se existe algum campo nulo e da insert no banco,caso contrario manda pra tela de login
if (!empty($titulo) ) {
    $sql = "INSERT INTO tbtarefa (`titulo`, `descricao`, `dateT`, `fkIdUsu`) VALUES('$titulo', '$descricao', '$data','$id')";
    $resultado =  mysqli_query($conn, $sql);

    if (mysqli_error($conn)) {
        echo "<script> alert('erro ao inserir no banco!'); </script>";
    } else {
        echo "<script> alert('Sucesso!'); </script>";
        header("refresh:1; url=tare.php");
    }
} else {
    echo "<script> alert('Impossivel cadastrar tarefa!'); </script>";
    header("refresh:1; url=addTare.php");
}
