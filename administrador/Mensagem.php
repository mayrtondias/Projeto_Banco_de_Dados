<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Guaragas</title>
        <link rel="stylesheet" type="text/css" href="../estilos/Padrao.css" media="all"/>
    </head>
    <body>

    <center>
        <div id="tres">
            <?php
            session_start();

            if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
                header('location: ../util/desconectado.php');
            }

            if (isset($_SESSION['mensagem']) == FALSE) {
                header('location: ../util/desconectado.php');
            } else {
                $tipo = (int) $_SESSION['mensagem'];
                switch ($tipo) {
                    case 1:
                        ?>
                        <a href="Home.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>OK</b></a>
                        <?php
                        break;
                    case 2:
                        ?>
                        <a href="HomeAdminDelete.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>OK</b></a>
                        <?php
                        break;
                    case 3:
                        ?>
                        <a href="HomeAdminAtualizar.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>OK</b></a>
                        <?php
                        break;
                    case 4:
                        ?>
                        <a href="HomeFuncDelete.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>OK</b></a>
                        <?php
                        break;
                    case 5:
                        ?>
                        <a href="HomeFuncAtualizar.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>OK</b></a>
                        <?php
                        break;
                    case 300:
                        ?>
                        <a href="Home.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>Erro ao pesquisar o Adminitrador</b></a>
                        <?php
                        break;

                    case 301:
                        ?>
                        <a href="Home.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>Erro ao pesquisar o Funcionário</b></a>
                        <?php
                        break;
                    default :
                        ?>
                        <a href="Home.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>OK</b></a>
                        <?php
                        break;
                }
            }
            ?>

        </div>

    </center>
</body>
</html>