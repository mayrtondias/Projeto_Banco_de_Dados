<?php

    require '../banco/Banco.php';

    $banco=new banco();

    $selecionado=$_POST['selecionado'];
    
    if($selecionado==="criarBanco"){
        $banco->criandoBanco();
    }else if($selecionado==="criarTabelas"){
        $banco->criandoTabelaAdministrador();
    }else if($selecionado==="detetarBanco"){
        
    }else if($selecionado==="detetarTabelas"){
        
    }else if($selecionado==="inserirAdministrador"){
        
    }else{
        header('location:ProgramadorHome.php');
    }
    
    
    
?>