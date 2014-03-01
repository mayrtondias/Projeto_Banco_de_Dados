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
        $banco->apagarTabelaAdministrador();
        $banco->apagarTabelaCliente();
        $banco->apagarTabelaFuncionario();
        $banco->apagarTabelaProduto();
        $banco->apagarTabelaVenda();
    }else if($selecionado==="inserirAdministrador"){
        $banco = new Banco();
        $banco->inserirAdministrador("Administrador", "admin", "12345678");
    }else{
        header('location:ProgramadorHome.php');
    }
    
    header('location:../util/Sucesso.php');
    
    
?>