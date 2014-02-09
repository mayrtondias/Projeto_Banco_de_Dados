<html>
    <head>
        <title>GuaraGas</title>
    </head>
   
    <body>
        <?php
        
            require '../banco/Banco.php';
            $banco=new banco();
            session_start();
            
            $login = $_POST['login'];      
            $senha = $_POST['senha'];
            
            $_SESSION['login']="";
            $_SESSION['senha']="";
            
            if(($login==="prog")&&($senha==="123")){
                $_SESSION['login']=$login;
                $_SESSION['senha']=$senha;
                header('location: ../programador/ProgramadorHome.php');
            }
            
            $tabela="administrador";
            $pesquisa="*";
            
            $resultado=$banco->pesquisar($pesquisa, $tabela);

            if($resultado==NULL){
                echo "Problema com a pesquisa! ".pg_errormessage();
            } else{
                while($registro = pg_fetch_array($resultado)){
                    
                    if(($registro['login']===$login)&&($registro['senha']===$senha)){
                        $_SESSION['login']=$registro['login'];
                        $_SESSION['senha']=$registro['senha'];
                        
                        header('location: ../administrador/Home.php');
                    }//verifica se o usuario é adm
                }
            }
            
            $tabela="funcionario";            
            $resultado=$banco->pesquisar($pesquisa, $tabela);

            if($resultado==NULL){
                echo "Problema com a pesquisa! ".pg_errormessage();
            } else{
                while($registro = pg_fetch_array($resultado)){
                    
                    if(($registro['login']===$login)&&($registro['senha']===$senha)){
                        $_SESSION['login']=$registro['login'];
                        $_SESSION['senha']=$registro['senha'];
                        header('location: ../funcionario/Home.php');
                    }
                }
            }
            
            if( ($_SESSION['login']==="")&&($_SESSION['senha']==="")){
                $_SESSION['login']="erro";
                $_SESSION['senha']="erro";
                header('location: indexErro.php');
            } 
        ?>
    </body>
</html>
