<?php
    session_start();

    if(isset($_SESSION['nome']) == TRUE){
        unset($_SESSION['nome']);
    }
   
    if(isset($_SESSION['email']) == TRUE) {
        unset($_SESSION['email']);
    }
   
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sair</title>
    </head>
    <body>
        <center>
            <p style="font-family: arial; font-size: 16px;color:#1C86EE"><b>Usuario desconectado!</b></p>
            <a href="../index.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>Voltar ao Sistema</b></a>
        </center>
    </body>
</html>
