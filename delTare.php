<?php
// verificar se o usuário está logado
session_start();


// conectar-se ao banco de dados
include("config.php");

// verificar se o usuário confirmou a exclusão
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Verifica se foi marcado sim
	if ($_POST["confirmacao"] == "sim") {
		// excluir o usuário do banco de dados
		$id = $_POST["idTare"];
		$sql = "DELETE FROM tbtarefa WHERE idTare=$id";
		if (mysqli_query($conn, $sql)) {

			echo "<script> alert('Tarefa excluída com sucesso.'); </script>";
			echo "<script> location.href='tare.php'; </script>";
		} else {
			echo "Erro ao excluir tarefa: " . mysqli_error($conn);
		}
		exit();
	} else {
		echo "<script> alert('Exclusão cancelada.'); </script>";
	}
}

// exibir a mensagem de confirmação
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Excluir</title>
</head>

<body>
	<form id="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<h1>Excluir tarefa</h1>
		<p>Tem certeza que deseja excluir essa tarefa?</p>
		<input id="idTare" type="hidden" name="id" value="<?php echo $_GET['idTare']  ?>">
		<div id="container-radio">
			<div>
				<input class="radio" type="radio" name="confirmacao" value="sim">Sim<br>
			</div>
			<div>
				<input class="radio" type="radio" name="confirmacao" value="nao" checked>Não<br>
			</div>
		</div>
		<input id="btn-excluir" type="submit" name="submit" value="Excluir">

	</form>
</body>

</html>