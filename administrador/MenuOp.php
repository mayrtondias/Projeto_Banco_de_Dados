<?php
session_start();

if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
    header('location: ../util/desconectado.php');
}
//
?>
<center>

    <h1 id="banner">GuaraGás - Satisfazendo pessoas em toda João Pessoa</h1>
    <center>
        <div id="conteudo">
            <ul id="menu">
                <li><a href="Home.php"><b> Home </b></a><br>						
                <li><b> Gerenciar Administrador </b>
                    <ul>
                        <li><a href="CadastraAdmin.php">Cadastrar Administrador</a></li>
                        <li><a href="HomeAdminList.php">Listar Administrador</a></li>
                        <li><a href="HomeAdminAtualizar.php">Atualizar Administrador</a></li>
                        <li><a href="HomeAdminDelete.php">Excluir Administrador</a></li>								
                    </ul>
                <li><b> Gerenciar Funcionário </b>
                    <ul>
                        <li><a href="CadastraFunc.php">Cadastrar Funcionario</a></li>
                        <li><a href="HomeFuncList.php">Listar Funcionario</a></li>
                        <li><a href="HomeFuncAtualizar.php">Atualizar Funcionario</a></li>
                        <li><a href="HomeFuncDelete.php">Excluir Funcionario</a></li>								
                    </ul>
                <li><b> Gerenciar Fornecedor </b>
                    <ul>
                        <li><a href="CadastraForne.php">Cadastrar Fornecedor</a></li>
                        <li><a href="HomeForneList.php">Listar Fornecedor</a></li>
                        <li><a href="HomeForneAtualizar.php">Atualizar Fornecedor</a></li>
                        <li><a href="HomeForneDelete.php">Excluir Fornecedor</a></li>								
                    </ul>
                <li><b>Produtos</b>
                    <ul>
                        <li><a href="CadastraProduto.php">Cadastrar Produto</a></li>
                        <li><a href="ProdutoList.php">Listar Produto</a></li>
                    </ul>
                <li><a href="../util/sair.php"><b> Sair </b></a><br></li>							
            </ul>

        </div> 	

    </center>
