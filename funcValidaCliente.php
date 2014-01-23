<?php
    
    require 'banco.php';
    
    $banco=new banco();
    session_start();
    
    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
        header('location: desconectado.php');
    }
            
    $nome = $_POST['nome'];      
    $contato = $_POST['contato'];
    $rua = $_POST['rua'];      
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero']; 
    $clienteCadastrado="f";
    $_SESSION['erro']="";
    $tabela="cliente";
    $pesquisa="*";

    $resultado=$banco->pesquisar($pesquisa, $tabela);

    if($resultado==NULL){
        echo "Problema na pesquisa<br>";
    } else{
          while($registro = pg_fetch_array($resultado)){
              if(($registro['rua']===$rua)&&($registro['bairro']===$bairro)&&($registro['numero']===$numero)){
                  $clienteCadastrado="t";
              }
          }
     }
 
    if(($nome==="")||(strlen($nome)>30)){
        $_SESSION['erro']="1";
    } else if(($contato==="")||(strlen($contato)<8)||(strlen($contato)>14)){
        $_SESSION['erro']="2";
    } else if(($rua==="")||(strlen($rua)>50)){
        $_SESSION['erro']="3";
    } else if(($bairro==="")||(strlen($bairro)>25)){
        $_SESSION['erro']="4";
    } else if(!$numero){
        $_SESSION['erro']="5";
    } else if($clienteCadastrado==="t"){
        $_SESSION['erro']="6";
    } 
    echo "----".$_SESSION['erro']."----";
    if($_SESSION['erro'] === ""){
        $banco->inserirCliente($nome, $contato, $rua, $bairro, $numero);
        unset($_SESSION['erro']);
        $_SESSION['mensagem']="1";
        header('location: mensagem.php');
    }else{
        header('location: funcCadCliente.php');
    }
?>