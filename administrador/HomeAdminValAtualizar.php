<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
        <link rel="stylesheet" type="text/css" href="../estilos/Padrao.css" media="all"/>
    </head>

    <body>

        <?php
        require 'MenuAdministrador.php';
        require '../banco/Banco.php';
        session_start();

        if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
            header('location: ../util/desconectado.php');
        }

        $banco = new banco();

        $chave = $_POST['chave'];
        $tabela = "administrador";
        $pesquisa = "*";

        $resultado = $banco->pesquisar($pesquisa, $tabela);

        if ($resultado == NULL) {
            echo "Problema na pesquisa.<br>";
        } else {
            while ($registro = pg_fetch_array($resultado)) {
                if ($registro['nome'] === $chave) {
                    $_SESSION['atualNome'] = $registro['nome'];
                    $_SESSION['atualLogin'] = $registro['login'];
                    $_SESSION['atualSenha'] = $registro['senha'];
                    break;
                }
            }
        }
        ?>

    <center>
        <div id="tres">
            <form action="ValidaAdminValAtualizarExec.php" method="post">
                Informe os dos abaixo para cadastrar um novo Administrador<br>
                Nome:<br>
                <input type="text" name="nome" value="<?php echo $_SESSION['atualNome']; ?>"><br>
                Login:<br>
                <input type="text" name="login" value="<?php echo $_SESSION['atualLogin']; ?>"><br>
                Senha:<br>
                <input type="password" name="senha" value="<?php echo $_SESSION['atualSenha']; ?>"><br>
                <?php
                if (isset($_SESSION['erro']) == TRUE) {
                    $tipo = (int) $_SESSION['erro'];
                    switch ($tipo) {
                        case 1:
                            $men = "O campo nome não deve ficar em branco<br>nem superior a 50 caracteres<br>";
                            break;
                        case 2:
                            $men = "O campo Login não deve ficar em branco<br>nem superior a 15 caracteres<br>nem inferior à 8 caracteres<br>";
                            break;
                        case 3:
                            $men = "O campo da senha não deve ficar em branco<br>nem inferior a 8 caracteres ou superior a 15 caracteres.<br>";
                            break;
                        case 30:
                            $men = "Ja existe um Adminitrador com esse nome.<br>";
                            break;
                        case 31:
                            $men = "Ja existe um Adminitrador com esse Login.<br>";
                            break;
                        case 32:
                            $men = "Aconteceu um erro, tente novamente!<br>";
                            break;
                        default :
                            $men = "";
                    }
                    echo $men;
                }
                ?>
                <input type="submit" value="Atualizar">
            </form>
        </div>

    </center>
</body>
</html>