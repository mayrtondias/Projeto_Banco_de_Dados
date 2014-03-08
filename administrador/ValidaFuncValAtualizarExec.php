<?php
    echo "passouuuu";
    require '../banco/Banco.php';
    echo "passouuuiu";
    session_start();
    echo "passouuouu";
    $banco=new Banco();
    echo "passouuuup";
    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
        header('location: ../util/desconectado.php');
    }
echo "passouuuu";
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $identidade = $_POST['identidade'];
    $cpf = $_POST['cpf'];
    $salario = $_POST['salario'];
    $telefone = $_POST['telefone'];
    $cargo = $_POST['cargo'];
    $usuarioCadastrado="f";
    $funcionarioCadastrado="f";
    $cpfCadastrado="f";
    $_SESSION['erro']="";
    
    $tabela="funcionario";
    $pesquisa="*";
echo "passou";
    $resultado=$banco->pesquisar($pesquisa, $tabela);

    if($resultado==NULL){
        echo "Problema na pesquisa.<br>";
    } else{
          while($registro = pg_fetch_array($resultado)){
              if($registro['cpf']===$cpf){
                  $cpfCadastrado="t";
              }
              if($registro['login']===$login){
                  $funcionarioCadastrado="t";
              }
          }
     }
     
    $tabela="administrador";
    $pesquisa="*";

    $resultado=$banco->pesquisar($pesquisa, $tabela);

    if($resultado==NULL){
        echo "Problema na pesquisa.<br>";
    } else{
          while($registro = pg_fetch_array($resultado)){
              if($registro['login']===$login){
                  $usuarioCadastrado="t";
              }
          }
     }
 
    if(($nome==="")||(strlen($nome)>30)){
        $_SESSION['erro']="1";
    } else if(($login==="")||(strlen($login)>15)){
        $_SESSION['erro']="2";
    } else if(($senha==="")||(strlen($senha)>15)){
        $_SESSION['erro']="3";
    } else if(($identidade==="")||(strlen($identidade)>15)){
        $_SESSION['erro']="4";
    } else if(($cpf==="")||(strlen($cpf)>14)){
        $_SESSION['erro']="5";
    } else if(($salario==="")||(((float)$salario)<0)){
        $_SESSION['erro']="6";
    } else if(($telefone==="")||(strlen($telefone)>14)){
        $_SESSION['erro']="7";
    } else if(($cargo==="")||(strlen($cargo)>20)){
        $_SESSION['erro']="8";
    } else if($funcionarioCadastrado==="t"){
        $_SESSION['erro']="9";
    } else if($usuarioCadastrado==="t"){
        $_SESSION['erro']="10";
    } else if($cpfCadastrado==="t"){
        $_SESSION['erro']="11";
    }
    
    if($_SESSION['erro'] === ""){
        
        $cpfAtual=$_SESSION['atualCpf'];
        $clausuraWere="cpf = '$nomeAtual'";

        if($cpf!==$_SESSION['atualCpf']){
            $clausuraSET="cpf = '$cpf' ";
            $resultado=$banco->update($tabela, $clausuraSET, $clausuraWere);
            if($resultado==NULL)$_SESSION['erro']="30";
        }
        
        $clausuraWere="cpf = '$cpf'";
        
        if($nome!==$_SESSION['atualNome']){
            $clausuraSET="nome = '$nome' ";
            $resultado=$banco->update($tabela, $clausuraSET, $clausuraWere);
            if($resultado==NULL)$_SESSION['erro']="31";
        }
        
        if($identidade!==$_SESSION['atualIdentidade']){
            $clausuraSET="identidade = '$identidade' ";
            $resultado=$banco->update($tabela, $clausuraSET, $clausuraWere);
            if($resultado==NULL)$_SESSION['erro']="32";
        }
        
        if($login!==$_SESSION['atualLogin']){
            $clausuraSET="login = '$login' ";
            $resultado=$banco->update($tabela, $clausuraSET, $clausuraWere);
            if($resultado==NULL)$_SESSION['erro']="33";
        }
        
        if($senha!==$_SESSION['atualSenha']){
            $clausuraSET="senha = '$senha' ";
            $resultado=$banco->update($tabela, $clausuraSET, $clausuraWere);
            if($resultado==NULL)$_SESSION['erro']="34";
        }
        
        if($login!==$_SESSION['atualSalario']){
            $sal=(float)$salario;
            $clausuraSET="salario = $sal ";
            $resultado=$banco->update($tabela, $clausuraSET, $clausuraWere);
            if($resultado==NULL)$_SESSION['erro']="35";
        }
        
        if($telefone!==$_SESSION['atualTelefone']){
            $clausuraSET="telefone = '$telefone' ";
            $resultado=$banco->update($tabela, $clausuraSET, $clausuraWere);
            if($resultado==NULL)$_SESSION['erro']="36";
        }
        
        if($cargo!==$_SESSION['atualCargo']){
            $clausuraSET="cargo = '$cargo' ";
            $resultado=$banco->update($tabela, $clausuraSET, $clausuraWere);
            if($resultado==NULL)$_SESSION['erro']="37";
        }
        
        if($_SESSION['erro'] === ""){
            unset($_SESSION['erro']);
            unset($_SESSION['atualNome']);
            unset($_SESSION['atualLogin']);
            unset($_SESSION['atualCpf']);
            unset($_SESSION['atualSenha']);
            unset($_SESSION['atualIdentidade']);
            unset($_SESSION['atualSalario']);
            unset($_SESSION['atualTelefone']);
            unset($_SESSION['atualCargo']);
            
            $_SESSION['mensagem']="3";
            header('location: mensagem.php');
        }else{
            header('location: HomeFuncValAtualizar.php');
        }
    }else{
        header('location: HomeFuncValAtualizar.php');
    }
?>