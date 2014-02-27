<?php

    require '../banco/NewBanco.php';
    require '../banco/Banco.php';
    
    $banco = new NewBanco();
    
    $selecionado=$_POST['selecionado'];
    
    if($selecionado==="criarBanco"){
        $banco->criandoBanco();
    }else if($selecionado==="criarTabelas"){
        $banco->criandoTabelaAdministrador();
        $banco->criandoTabelaCliente();
        $banco->criandoTabelaFuncionario();
        $banco->criandoTabelaProduto();
        $banco->criandoTabelaVenda();
    }else if($selecionado==="detetarBanco"){
        $banco->apagarBanco();
    }else if($selecionado==="detetarTabelas"){
        
    }else if($selecionado==="inserirAdministrador"){
        
    }else{
        header('location:ProgramadorHome.php');
    }
    
    header('location:../util/Sucesso.php');
    
    
?>