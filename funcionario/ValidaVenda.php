<?php
    
    require '../banco/Banco.php';
    
    $banco=new banco();
    session_start();
    
    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
        header('location: ../util/desconectado.php');
    }
            
    $chave_produto = $_POST['codigo'];      
    
    $array = $_POST['teste'];
    foreach ($array as &$value){
        if($value>0){
            $quantidade=$value;
            break;
        }
    }
echo $quantidade;

    $rua = $_SESSION['rua'];      
    $bairro = $_SESSION['bairro'];
    $numero = $_SESSION['numero']; 
    
    $_SESSION['erro']="";
    $tabela="cliente";
    $pesquisa="*";

    $resultado=$banco->pesquisar($pesquisa, $tabela);

    if($resultado==NULL){
        echo "Problema na pesquisa.<br>";
    } else{
          while($registro = pg_fetch_array($resultado)){
              if(($registro['rua']===$rua)&&($registro['bairro']===$bairro)&&($registro['numero']===$numero)){
                  $_SESSION['nome']=$registro['nome'];
                  $_SESSION['contato']=$registro['contato'];
              }
          }
     }

     $tabela="produto";
     $resultado=$banco->pesquisar($pesquisa, $tabela);
     
     if($resultado==NULL){
        echo "Problema na pesquisa.<br>";
    } else{
          while($registro = pg_fetch_array($resultado)){
              if($registro['codproduto']==(int)$chave_produto){
                  $_SESSION['nomeProduto']=$registro['nome'];
                  $_SESSION['valorProduto']=$registro['valor'];
                  $_SESSION['quantidadeProduto']=$registro['quantidade'];
                  $_SESSION['codigoProduto']=$registro['codproduto'];
              }
          }
     }
     

     $resto=((int)$_SESSION['quantidadeProduto'])-((int)$quantidade);

    if($resto<0){
        $_SESSION['erro']="1";
    }  

    if($_SESSION['erro'] === ""){
        $data=date("j/n/Y");
        $hora=date("H:i");
        echo " $data , $hora , ".$_SESSION['valorProduto']." , $quantidade , ".$_SESSION['codigoProduto']." , 1, $rua, $bairro, (int)$numero";
        
        $banco->inserirVenda($data, $hora, (float)$_SESSION['valorProduto'], (int)$quantidade, (int)$_SESSION['codigoProduto'], "1", $rua, $bairro, (int)$numero);
        
        $tabela="produto";
        
        $clausuraWere="codproduto = '$chave_produto'";
        $clausuraSET="quantidade = '$resto' ";
        $resultado=$banco->update($tabela, $clausuraSET, $clausuraWere);
        
        $banco->update($tabela, $clausuraSET, $clausuraWere);
        unset($_SESSION['erro']);
        
        $_SESSION['mensagem']="1";
        header('location: mensagem.php');
    }else{
       header('location: Home.php');
    }
    
?>