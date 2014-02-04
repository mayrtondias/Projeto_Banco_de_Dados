<?php
    
    require '../banco/banco.php';
    
    $banco=new banco();
    session_start();
    
    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
        header('location: ../util/desconectado.php');
    }
            
    $nome = $_POST['nome'];      
    $login = $_POST['login'];
    $senha = $_POST['senha'];  
    $identidade = $_POST['identidade'];
    $cpf = $_POST['cpf'];
    $salario = $_POST['salario'];
    $telefone = $_POST['telefone'];
    $cargo = $_POST['cargo'];
    $funcionarioCadastrado="f";
    $_SESSION['erro']="";
    
    $tabela="funcionario";
    $pesquisa="*";

    $resultado=$banco->pesquisar($pesquisa, $tabela);

    if($resultado==NULL){
        echo "Problema na pesquisa<br>";
    } else{
          while($registro = pg_fetch_array($resultado)){
              if(($registro['cpf']===$cpf)||($registro['login']===$login)){
                  $produtoCadastrado="t";
              }
          }
     }
 
    if(($nome==="")||(strlen($nome)>30)){
        $_SESSION['erro']="1";
    } else if(($valor===NULL)||($valor<0)){////////////////////////////////////////////////////////////////////////////////////////////////
        $_SESSION['erro']="2";
    } else if(($codProduto===NULL)||($valor<0)){
        $_SESSION['erro']="3";
    } else if(($quantidade===NULL)||($valor<0)){
        $_SESSION['erro']="4";
    } else if($produtoCadastrado==="t"){
        $_SESSION['erro']="5";
    } 
    
    if($_SESSION['erro'] === ""){
        $banco->inserirProduto($nome, $valor, $codProduto,$quantidade);
        unset($_SESSION['erro']);
        $_SESSION['mensagem']="1";
        header('location: mensagem.php');
    }else{
        header('location: HomeAdmin.php');
    }
?>
