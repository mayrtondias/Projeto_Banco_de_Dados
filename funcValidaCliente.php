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


            $men="";
            if( ( isset($_SESSION['erro']) == FALSE) ){
                $_SESSION['erro']="";
            }else{
                $nome = $_POST['nome'];      
                $email = $_POST['email'];
                $contato = $_POST['contato'];      
                $cpf = $_POST['cpf'];
                $lote = $_POST['lote'];      
                $senha = $_POST['senha'];
                $vsenha = $_POST['vsenha'];
               
                $_SESSION['erro']="";
               
               
                $aux=(int)$lote;
               
                $tabela="pessoa";
                $pesquisa="*";

                $resultado=$banco->pesquisar($pesquisa, $tabela);

                if($resultado==NULL){
                    echo "Problema no comando SQL, erro ".  mysql_error();
                } else{
                      while($registro = mysql_fetch_array($resultado))
                      {
                          if($registro['email']===$email){
                              $emailencontrado="e";
                          }
                      }
                 }
               
                if($nome===""){
                    $_SESSION['erro']="1";
                } else if($email===""){
                    $_SESSION['erro']="2";
                } else if($emailencontrado==="e"){
                    $_SESSION['erro']="3";
                } else if(($contato==="")||(strlen($contato)!=13)){
                    $_SESSION['erro']="4";
                } else if(($cpf==="")||(strlen($cpf)!=14)){
                    $_SESSION['erro']="5";
                } else if(($lote==="")||($aux<=0)||($aux>15)){
                    $_SESSION['erro']="6";
                } else if(($senha==="")||($senha!=$vsenha)){
                    $_SESSION['erro']="7";
                }
                //inserindo no banco
                if($_SESSION['erro']===""){
                    $banco->inserirPessoa($email, $nome, $cpf, $contato, $senha, $lote);
                    unset($_SESSION['erro']);
                    header('location: condominoAdmin.php');
                   
                }
               
               
            }
           
            if($_SESSION['erro']!==""){
                $tipo=(int)$_SESSION['erro'];
                switch ($tipo){
                    case 1:
                        $men="O campo nome não pode ficar em branco";
                        break;
                    case 2:
                        $men="O campo email não pode ficar em branco";
                        break;
                    case 3:
                        $men="O email informado já esta cadastrado";
                        break;
                    case 4:
                        $men="O contato deve ser no formato (xx)xxxx-xxxx";
                        break;
                    case 5:
                        $men="O CPF deve ser no formato 000.000.000-00";
                        break;
                    case 6:
                        $men="O lote deve ser entre 1 ate 15";
                        break;
                    case 7:
                        $men="As senhas estão diferentes";
                        break;
                    default :
                        $men="";
                   
                }
            }
