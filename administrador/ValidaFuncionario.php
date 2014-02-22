<?php
    
    require '../banco/Banco.php';
    
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
    } else if(($login===NULL)||(strlen($login)>15)){////////////////////////////////////////////////////////////////////////////////////////////////
        $_SESSION['erro']="2";
    } else if(($senha===NULL)||(strlen($senha)>15)){
        $_SESSION['erro']="3";
    } else if(($identidade===NULL)||(strlen($identidade)>15)){
        $_SESSION['erro']="4";
    } else if(($cpf===NULL)||(strlen($cpf)>14)){
        $_SESSION['erro']="5";
    } else if(($salario===NULL)||($salario<0)){
        $_SESSION['erro']="6";
    } else if(($telefone===NULL)||(strlen($telefone)>14)){
        $_SESSION['erro']="7";
    } else if(($cargo===NULL)||(strlen($cargo)>20)){
        $_SESSION['erro']="8";
    } else if($funcionarioCadastrado==="t"){
        $_SESSION['erro']="9";
    }
    
    if($_SESSION['erro'] === ""){
        $banco->inserirFuncionario($cpf, $nome, $identidade, $login, $senha, $salario, $telefone, $cargo);
        unset($_SESSION['erro']);
        $_SESSION['mensagem']="1";
        header('location: mensagem.php');
    }else{
        header('location: CadastraFunc.php');
    }
?>