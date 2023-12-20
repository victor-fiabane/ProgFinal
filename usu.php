<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div id="header">
        <div id="menu">
            <input class="botoes" id="welcome" type="button" onclick="location.href='welcome.php'" value="Menu">
            <input class="botoes" id="logout" type="button" onclick="location.href='logout.php'" value="Deslogar">
        </div>
    </div>

    <div id="conteudo">
        <h1>Usuários:</h1>
        <div>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>ADM</th>
                    <th>Config</th>
                </tr>
                <?php

                include("config.php");
                

                $sql = "SELECT * FROM tbusuario ORDER BY idUsu";
                $res = $conn->query($sql) or die($conn->error);


        
                    while ($row = mysqli_fetch_assoc($res)) {

                        $id = $row['idUsu'];
                        echo "<tr>";
                        echo "<td>" . $row['idUsu'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['adm'] . "</td>";
                        echo "<td><a href='editUsu.php?id=" . $row['idUsu'] . "'>Editar</a> | <a href='delUsu.php?idUsu=" . $row['idUsu'] . "'>Excluir</a></td>";
                        echo "</tr>";
                    }
              
                ?>
            </table>
        </div>
    </div>
</body>

</html>