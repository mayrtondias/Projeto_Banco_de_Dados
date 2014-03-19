<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
        <link rel="stylesheet" type="text/css" href="../estilos/Padrao.css" media="all"/>
    </head>
     
    <body>
        <?php
            require 'MenuFuncionario.php';
            require '../banco/Banco.php';
            
            $banco=new banco();
            session_start();

            if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
                header('location: ../util/desconectado.php');
            }
          
            $chave=explode("§", $_POST['chave']);
                    $rua=$chave[0];
                    $bairro=$chave[1];
                    $numero=$chave[2];

            $tabela="cliente";
            $pesquisa="*";
           
            $resultado=$banco->pesquisar($pesquisa, $tabela);

            if($resultado==NULL){
                echo "Problema na pesquisa.<br>";
            }else{
                while($registro = pg_fetch_array($resultado)){
                    if(($registro['rua']===$rua)&&($registro['bairro']===$bairro)&&($registro['numero']===$numero)){
                        $_SESSION['atualNome']=$registro['nome'];
                        $_SESSION['atualContato']=$registro['contato'];
                        $_SESSION['atualRua']=$registro['rua'];
                        $_SESSION['atualBairro']=$registro['bairro'];
                        $_SESSION['atualNumero']=$registro['numero'];
                        break;
                    }
                }
            }
        ?>
        
        <center>
            <div id="tres">
                <form action="ClienteValAtualizarExec.php" method="post">
                    Informe os dos abaixo para cadastrar um novo cliente <br>
                    Nome:<br>
                    <input type="text" name="nome" value="<?php echo $_SESSION['atualNome']; ?>"><br>
                    Contato:<br>
                    <input type="text" name="contato" value="<?php echo $_SESSION['atualContato']; ?>"><br>
                    Rua:<br>
                    <input type="text" name="rua" value="<?php echo $_SESSION['atualRua']; ?>"><br>
                    Bairro:<br>
                    <input type="text" name="bairro" value="<?php echo $_SESSION['atualBairro']; ?>"><br>
                    Numero:<br>
                    <input type="text" name="numero" value="<?php echo $_SESSION['atualNumero']; ?>"><br>
                    <?php
                        if(isset($_SESSION['erro'])==TRUE){
                            $tipo=(int)$_SESSION['erro'];
                            switch ($tipo){
                                case 1:
                                    $men="O campo nome não deve ficar em branco<br>nem superior a 30 caracteres<br>";
                                    break;
                                case 2:
                                    $men="O campo contato não deve ficar em branco<br>deve ser nesse formato(xxx)xxxx-xxxx<br>";
                                    break;
                                case 3:
                                    $men="O campo da rua não deve ficar em branco<br>nem superior a 50 caracteres.<br>";
                                    break;
                                case 4:
                                    $men="O campo do bairro não deve ficar em branco<br>nem superior a 25 caracteres.<br>";
                                    break;
                                case 5:
                                    $men="O campo do numero não deve ficar em branco<br>Digite um numero valido.<br>";
                                    break;
                                case 6:
                                    $men="Endereço ja cadastrado no sistema<br>";
                                    break;
                                default :
                                    $men="";
                            }
                            echo $men;
                        }
                    ?>
                    <input type="submit" value="Atualizar">
                </form>
            </div>
        </center>
    </body>
</html>