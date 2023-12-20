<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cadastro</title>
</head>
<body>
<div>
    <form id="formulario" action="cadastroTare.php" method="POST">
        <h1>Adicioanr tarefa</h1>
        <input id="titulo" name="titulo" type="text" placeholder="Titulo">
        <input id="descricao" name="descricao" type="text" placeholder="Descrição">
        <input id="dateT" name="dateT" type="date" placeholder="Data">
        <div>
        <input id="enviar" type="submit" value="Enviar">
        <input id="Voltar" type="button" value="Voltar" onclick="location.href='tare.php'">
        </div>
    </form>
</div>

</body>
</html>