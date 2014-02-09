<?php

    require '../banco/Banco.php';

    $banco=new banco();

    $selecionado=$_POST['selecionado'];
    
    if($selecionado==="criarBanco"){
        $banco->criandoBanco("testee");
    }else if($selecionado==="criarTabelas"){
        
    }else if($selecionado==="detetarBanco"){
        
    }else if($selecionado==="detetarTabelas"){
        
    }else if($selecionado==="inserirAdministrador"){
        
    }else{
        header('location:ProgramadorHome.php');
    }
    
    
?>