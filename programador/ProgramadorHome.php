<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
        <link rel="stylesheet" type="text/css" href="../estilos/Padrao.css" media="all"/>
    </head>

    <body>
        <!-- logout!-->
        <div style="border-radius:1em; width:25%; font-size:12px;background:#0000f0; float: right; border-bottom: 5px">
            <center>
                <a href="../util/sair.php" style="color:white; font-family:arial; text-decoration:none; padding:5px"><b><i style="">Logout</i></b></a><br>
            </center>
        </div>
        </br>
    <center>
        <div  id="tres" style="width: 50%;padding: 5px">
            <?php
            session_start();
            if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
                header('location:../util/Desconectado.php');
            }
            ?>
            <form action="ConstruindoBanco.php" method="post">
                <button type="submit" name="selecionado" value="1">Criar Banco</button>
                <button type="submit" name="selecionado" value="2">Criar Tabela Administrador</button>
                <button type="submit" name="selecionado" value="3">Criar Tabela Cliente</button>
                <button type="submit" name="selecionado" value="4">Criar Tabela Funcionario</button>
                <button type="submit" name="selecionado" value="5">Criar Tabela Produto</button>
                <button type="submit" name="selecionado" value="6">Criar Tabela Venda</button>
                <button type="submit" name="selecionado" value="8">Criar Tabela Fornecedor</button>

                <button type="submit" name="selecionado" value="10">Apagar Banco</button>
                <button type="submit" name="selecionado" value="11">Criar Indices Administrador</button>
                <button type="submit" name="selecionado" value="12">Criar Indices Cliente</button>
                <button type="submit" name="selecionado" value="15">Criar Indices Fornecedor</button>

                <button type="submit" name="selecionado" value="16">Criar Indices Funcionario</button>
                <button type="submit" name="selecionado" value="17">Criar Indices Produto</button>
                <button type="submit" name="selecionado" value="18">Criar Indices Venda</button>
                <button type="submit" name="selecionado" value="19">Apagar Tabela Administrador</button>
                <button type="submit" name="selecionado" value="20">Apagar Tabela Cliente</button>

                <button type="submit" name="selecionado" value="23">Apagar Tabela Fornecedor</button>
                <button type="submit" name="selecionado" value="24">Apagar Tabela Funcionario</button>
                <button type="submit" name="selecionado" value="25">Apagar Tabela Produto</button>
                <button type="submit" name="selecionado" value="26">Apagar Tabela Venda</button>
                <button type="submit" name="selecionado" value="27">Inserir Administrador padrão</button>
            </form>
        </div>
    </center>
</body>
</html>