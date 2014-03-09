<?php
    require '../banco/Banco.php';

    $banco=new banco();
    session_start();

    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
        header('location: ../util/desconectado.php');
    }

    $chave=explode("§", $_POST['selecionado']);
                    $rua=$chave[0];
                    $bairro=$chave[1];
                    $numero=$chave[2];
    
    $tabela="cliente";
    $clausuraWere="rua='$rua' AND bairro= '$bairro' AND numero='$numero'";

    $resultado=$banco->deletar($tabela, $clausuraWere);
    
    if($resultado==NULL){
        echo "Problema na exclusão.<br>";
    }else{
        $_SESSION['mensagem']="2";
        header('location: mensagem.php');
        
    }
    ?>