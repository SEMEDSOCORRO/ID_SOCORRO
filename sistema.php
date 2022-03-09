<?php

include('protect.php');

?>

<!-- Página principal do sistema-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Busca</title>
</head>
<body>
    <h1>Busca de Dados dos Alunos Cadastrados no Sistema</h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite os termos de pesquisa" type="text">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
<body>
    Bem vindo ao Sistema, <?php echo $_SESSION['nome']; ?>.

    <table width="1300px" border="1">
        <tr>
            
            <th>nome</th>
            <th>cpf</th>
            <th>pai</th>
            <th>mae</th>
                       
        </tr>
        <?php
        if (!isset($_GET['busca'])) {
            ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
                FROM  nome
                WHERE cpf LIKE '%$pesquisa%' 
                OR pai LIKE '%$pesquisa%'
                OR mae LIKE '%$pesquisa%'";
               $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['cpf']; ?></td>
                        <td><?php echo $dados['pai']; ?></td>
                        <td><?php echo $dados['mae']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>

    <p>
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>