<?php
    session_start();

    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
        header('location: ../util/desconectado.php');
    }
?>
    <div  style="border-radius:1em; width:20%; font-size:25px; background:#3399FF;float: left">  
        <center>
            <a href="Home.php" style="color:white; font-family:arial; text-decoration:none; padding:5px"><b>  Home         </b></a><br><hr>
            <a href="HomeAdmin.php" style="color:white; font-family:arial; text-decoration:none; padding:5px"><b>  Cadastrar Administrador         </b></a><br><hr>
            <a href="HomeFunc.php" style="color:white; font-family:arial; text-decoration:none; padding:5px"><b>  Gerenciar Funcionario         </b></a><br><hr>
            <a href="HomeEstoque.php" style="color:white; font-family:arial; text-decoration:none; padding:5px"><b>  Estoque        </b></a><br><hr>
            <a href="HomeFinancas.php" style="color:white; font-family:arial; text-decoration:none; padding:5px"><b>  Finanças        </b></a><br><hr>
            <a href="../util/sair.php" style="color:white; font-family:arial; text-decoration:none; padding:5px"><b>  Sair         </b></a><br>
        </center>
    </div>
    <!-- logout!-->
    <div  style="border-radius:1em; width:25%; font-size:12px;background:#00BFFF; float: right; border-bottom: 5px">
        <center>
            <a href="../util/sair.php" style="color:white; font-family:arial; text-decoration:none; padding:5px"><b>Olá <?php echo $_SESSION['login'];?>, <i style="">Logout</i></b></a><br>
        </center>
    </div>
    <br>