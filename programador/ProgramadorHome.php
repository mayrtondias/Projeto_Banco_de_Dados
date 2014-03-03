<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
    </head>
     
    <body>
        <!-- logout!-->
        <div style="border-radius:1em; width:25%; font-size:12px;background:#33aa00; float: right; border-bottom: 5px">
            <center>
                <a href="../util/sair.php" style="color:white; font-family:arial; text-decoration:none; padding:5px"><b>Olá <?php echo $_SESSION['login'];?>, <i style="">Logout</i></b></a><br>
            </center>
        </div>
        </br>
        <center>
            <div  style="border-radius:1em; width:20%; font-size:25px; background:#33aa00; margin: 10px; padding: 20px">
                <?php
                    session_start();
                    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
                        header('location:../util/Desconectado.php');
                    }
                ?>
                <form action="ConstruindoBanco.php" method="post">
                    <button type="submit" name="selecionado" value="criarBanco">Criar Banco</button>
                    <button type="submit" name="selecionado" value="criarTabelas">Criar Tabelas</button>
                    <button type="submit" name="selecionado" value="detetarBanco">Detetar Banco</button>
                    <button type="submit" name="selecionado" value="detetarTabelas">Detetar Tabelas</button>
                    <button type="submit" name="selecionado" value="inserirAdministrador">Inserir Administrador padrão</button>
                </form>
            </div>
        </center>
    </body>
</html>