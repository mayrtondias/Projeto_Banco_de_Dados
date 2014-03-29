<?php
session_start();

if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
    header('location: ../util/desconectado.php');
}
//<h1 id="banner">GuaraGás - Satisfazendo pessoas em toda João Pessoa</h1>
?>
<center>

    <h1 id="banner">GuaraGás - Satisfazendo pessoas em toda João Pessoa</h1>

    <div id="conteudo">
        <ul id="menu">
            <li><a href="Home.php"><b> Home </b></a><br>						
            <li><b> Realizar Vendas </b>
                <ul>
                    <li><a href="Vendas.php">Realizar Venda</a></li>								
                </ul>
            <li><b> Gerenciar Clientes </b>
                <ul>
                    <li><a href="ClienteCadastrar.php">Cadastrar Cliente</a></li>
                    <li><a href="ClienteList.php">Listar Cliente</a></li>
                    <li><a href="ClienteAtualizar.php">Atualizar Cliente</a></li>
                    <li><a href="ClienteDelete.php">Excluir Cliente</a></li>								
                </ul>

            <li><a href="../util/sair.php"><b> Sair </b></a><br></li>							
        </ul>

    </div> 	

    <div id="dois">
        Copyright © 2014 by Fellipe Mahon, Mayrton Dias e Vitor Soares.</br>
        Todos os direitos reservados.
    </div>
</center>
<br>