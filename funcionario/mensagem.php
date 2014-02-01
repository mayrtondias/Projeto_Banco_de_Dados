<?php
    
    session_start();
    
    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
        header('location: ../util/desconectado.php');
    }
    
    if( isset($_SESSION['mensagem']) == FALSE){
        header('location: ../util/desconectado.php');
    }else{
        $tipo=(int)$_SESSION['mensagem'];
        switch ($tipo){
            case 1:
                $men="Cadastro feito com Sucesso!";
                break;
            case 2:
                $men="A decidir";
                break;
            case 3:
                $men="A decidir";
                break;
            default :
                $men=" ";
                break;
        }
        echo $men;
       
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Guaragas</title>
    </head>
    <body>
        <center>
            
            <a href="Home.php" style="border-radius:1em;color:#FFFFFF; font-family:arial; text-decoration:none; padding:5px;background:#1C86EE"><b>OK</b></a>
        </center>
    </body>
</html>