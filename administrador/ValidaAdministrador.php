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
    $administradorCadastrado="f";
    $usuarioCadastrado="f";
    $_SESSION['erro']="";
    
    $tabela="administrador";
    $pesquisa="*";

    $resultado=$banco->pesquisar($pesquisa, $tabela);

    if($resultado==NULL){
        echo "Problema na pesquisa.<br>";
    } else{
          while($registro = pg_fetch_array($resultado)){
              if($registro['login']===$login){
                  $administradorCadastrado="t";
              }
          }
     }
     
     $tabela="funcionario";
     $pesquisa="*";
     
     if($resultado==NULL){
        echo "Problema na pesquisa.<br>";
     } else{
          while($registro = pg_fetch_array($resultado)){
              if($registro['login']===$login){
                  $usuarioCadastrado="t";
              }
          }
     }
     
     
     if(($nome==="")||(strlen($nome)>50)){
         $_SESSION['erro']="1";
     } else if(($login==="")||(strlen($login)>15)){
         $_SESSION['erro']="2";
     } else if(($senha==="")||(strlen($senha)>15)||(strlen($senha)<8)){
         $_SESSION['erro']="3";
     } else if($administradorCadastrado==="t"){
         $_SESSION['erro']="4";
     } else if($usuarioCadastrado==="t"){
         $_SESSION['erro']="5";
     } 
    
     if($_SESSION['erro'] === ""){
         $banco->inserirAdministrador($nome, $login, $senha);
         unset($_SESSION['erro']);
         $_SESSION['mensagem']="1";
         header('location: mensagem.php');
     }else{
         header('location: HomeAdmin.php');
     }
?>