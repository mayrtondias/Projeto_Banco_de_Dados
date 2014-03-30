<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guaragas</title>
        <link rel="stylesheet" type="text/css" href="estilos/Padrao.css" media="all"/>
    </head>

    <body>

        <?php
        session_start();

        if (( isset($_POST['nome']) == FALSE) || ( isset($_POST['senha']) == FALSE)) {
            
        } else {
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];

            if (($nome === "prog") && ($senha === "123")) {
                $_SESSION['login'] = $nome;
                $_SESSION['senha'] = $senha;

                if (isset($_SESSION['erro']) == TRUE) {
                    unset($_SESSION['erro']);
                }

                header('location: programador/ProgramadorHome.php');
            } else {
                $_SESSION['erro'] = TRUE;
            }
        }
        ?>

    <center>
        <div  style="border-radius:1em; width:20%; font-size:25px; background:#33aa00; margin: 15%">
            <form action="IndexProg.php" method="post">
                <label style="color:white; font-family:arial; text-decoration:none; padding:5px">Login:</label><br>
                <input type="text" name="nome"><br>
                <label style="color:white; font-family:arial; text-decoration:none; padding:5px">Senha:</label><br>
                <input type="password" name="senha"><br>
                <?php
                if (isset($_SESSION['erro']) == TRUE) {
                    if ($_SESSION['erro'] == TRUE) {
                        echo '<label style="color:red; font-family:arial; text-decoration:none; padding:5px">Errou!</label><br>';
                    }
                }
                ?>
                <input type="submit" value="Entrar">
            </form>
        </div>
    </center>
</body>
</html>
