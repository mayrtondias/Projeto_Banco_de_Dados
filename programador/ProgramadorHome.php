<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
    </head>
     
    <body>
        <center>
            <div  style="border-radius:1em; width:20%; font-size:25px; background:#3399FF">
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
                    <button type="submit" name="selecionado" value="inserirAdministrador">Inserir Administrador padrao</button>
                </form>
            </div>
        </center>
    </body>
</html>