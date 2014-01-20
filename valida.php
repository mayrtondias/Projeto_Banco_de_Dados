<html>
    <head>
        <title>GuaraGas</title>
    </head>
   
    <body>
        <?php
        
            require 'banco.php';
            $banco=new banco();
            session_start();
            
            $login = $_POST['login'];      
            $senha = $_POST['senha'];
            
            $_SESSION['login']==="";
            $_SESSION['senha']==="";
            
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
                        
                        header('location: adminHome.php');
                    }
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
                        header('location: funcHome.php');
                    }
                }
            }
            echo " ".$_SESSION['login']." - ".$_SESSION['senha']." <br>Jesus<br>";
            if( ($_SESSION['login']==="")&&($_SESSION['senha']==="")){
                $_SESSION['login']="erro";
                $_SESSION['senha']="erro";
                header('location: indexErro.php');
            }
            echo "<br>fim<br>";
        ?>
    </body>
</html>
