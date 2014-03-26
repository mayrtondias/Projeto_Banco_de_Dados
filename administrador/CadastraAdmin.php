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
        ?>
    <center>
        <div id="tres">
            <form action="ValidaAdministrador.php" method="post">
                Informe os dos abaixo para cadastrar um novo Administrador<br>
                Nome:<br>
                <input type="text" name="nome"><br>
                Login:<br>
                <input type="text" name="login"><br>
                Senha:<br>
                <input type="password" name="senha"><br>
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
                            $men = "O campo da senha não deve ficar em branco<br>nem superior a 15 caracteres.<br>";
                            break;
                        case 4:
                            $men = "Administrador ja cadastrado no sistema.<br>";
                            break;
                        case 5:
                            $men = "Usuario ja cadastrado no sistema, modifique o Login.<br>";
                            break;
                        default :
                            $men = "";
                    }
                    echo $men;
                }
                ?>
                <input type="submit" value="Cadastrar">
            </form>
        </div>

    </center>
</body>
</html>