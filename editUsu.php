<?php
// verificar se o usuário está logado
session_start();



// conectar-se ao banco de dados
include("config.php");

// verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// atualizar os dados do usuário no banco de dados
	$id = $_POST["idUsu"];
	$nome = $_POST["nome"];
	$email = $_POST['email'];
	$adm = $_POST['adm'];
	$sql = "UPDATE tbusuario SET nome='$nome', email='$email', adm='$adm' WHERE idUsu='$id'";

//var_dump($sql);
//exit();

	if (mysqli_query($conn, $sql)) {
		echo "Usuário atualizado com sucesso.";

		if($id == $_SESSION['idUsu']){
			$_SESSION["idUsu"] = $row->idUsu ;
			$_SESSION["email"] = $email;
			$_SESSION["nome"] = $row->nome;
			$_SESSION["adm"] = $row->adm;
		}
		
	} else {
		echo "Erro ao atualizar usuário: " . mysqli_error($conn);
	}

	// redirecionar de volta para o perfil do usuário
	header("Location: usu.php");
	exit();

} else {
	// exibir o formulário preenchido com os dados do usuário
	$id = $_GET["id"];
	$sql = "SELECT * FROM tbusuario WHERE idUsu='$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$nome = $row['nome'];
	$email = $row['email'];
    $adm = $row['adm'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Editar usuário</title>
</head>
<body>
<div id="header">
        <div id="menu">
            <input id="welcome" type="button" onclick="location.href='welcome.php'" value="Menu">
            <input id="logout" type="button" onclick="locaton.href='logout.php'" value="Deslogar">
        </div>
    </div>


<form id="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<h1 id="titulo-formulario">Editar usuário:</h1>
        <input id="idUsu" type="hidden" name="idUsu" value="<?php echo $_GET['id']?>">
		<input class="input" placeholder="Nome:" type="text" name="nome" value="<?php echo $nome; ?>">
		<input class="input" placeholder="Email:" type="type" name="email" value="<?php echo $email; ?>">
				<input id="admSim" class = "radio" type="radio" name="adm" value="1">
				<label for="huey">Sim</label>
				<input class = "radio" type="radio" name="adm" value="0" checked>
				<label for="admNao">Não</label>
				<br>
				<div id="botoes">
		<input id="btn-editar" type="submit" name="submit" value="Editar">
		<input id="Menu" type="button" onclick="location.href='welcome.php'" Value="Menu">
	</div>
	</form>
</body>
</html>