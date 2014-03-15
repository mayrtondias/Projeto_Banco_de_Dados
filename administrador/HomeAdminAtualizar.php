<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
        <link rel="stylesheet" type="text/css" href="../estilos/Padrao.css" media="all"/>
    </head>

    <body>
        
        <?php
            require 'MenuAdministrador.php';
        ?>
        <center>
            <div id="tres">
                <form method="POST" action="HomeAdminValAtualizar.php" >
                    <?php

                    require '../banco/Banco.php';

                    $banco=new banco();
                    session_start();

                    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
                        header('location: ../util/desconectado.php');
                    }
                    
                    $tabela="administrador";
                    $pesquisa="*";
                       
                    $resultado=$banco->pesquisar($pesquisa, $tabela);

                    if($resultado==NULL){
                        echo "Problema na pesquisa<br>";
                    } else{
                        ?>
                <table>
                    <tr>
                        <td></td>
                        <td>Nome</td>
                        <td>Login</td>
                        <td>Atualizar</td>
                    </tr>
                        <?php
                        $contador=1;
                        if( isset($_POST['selecionado'])==false){
                            $qtdeResult=0;
                        }else if(($_POST['selecionado']==="anterior")||($qtdeResult>1)){
                                --$qtdeResult;
                        }else if($_POST['selecionado']==="proximo"){
                                ++$qtdeResult;
                        }else $qtdeResult=0;

                        while($registro = pg_fetch_array($resultado)){
                              
                            if(($contador>=($qtdeResult*10))&&($contador<($qtdeResult*10+10))){
                                  ?>
                                  <tr>
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $registro['nome']; ?></td>
                                    <td><?php echo $registro['login']; ?></td>
                                    <td><button type="submit" name="chave" value="<?php echo $registro['nome']; ?>" >OK</button></td>
                                  </tr>
                                <?php
                                
                              }
                              ++$contador;
                          }
                      }
            ?>
                </table>
            </form>
                <form method="POST" action="HomeAdminAtualizar.php" >
                    <?php
                    
                if($qtdeResult>0){
                              ?>
                              <button type="submit" name="selecionado" value="anterior" >Anterior</button>
                              <?php
                              
                          }
                          
                          if((($contador/10)>=($qtdeResult+1))&&(($contador%10)!=0)){
                              ?>
                              <button type="submit" name="selecionado" value="proximo" >Próximo</button>
                              <?php
                          }
                 ?>
             </form>
        </div>
    </center>
    </body>
</html>