<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
    </head>

    <body>
        <?php
            require 'MenuAdministrador.php';
        ?>
        <center>
        <div style="border-radius:1em; width:20%; font-size:25px; background:#3300FF;border: 30px">
            <form method="POST" action="HomeAdminList.php" >
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
                                  </tr>
                                <?php
                                
                              }
                              ++$contador;
                          }
                          
                          if($qtdeResult>0){
                              ?>
                              <td><button type="submit" name="selecionado" value="anterior" >Anterior</button></td>
                              <?php
                              
                          }
                          
                          if((($contador/10)>=($qtdeResult+1))&&(($contador%10)!=0)){
                              ?>
                              <td><button type="submit" name="selecionado" value="proximo" >Próximo</button></td>
                              <?php
                          }
                          
                      }
            ?>
                </table>
            </form>
        </div>
            </center>
    </body>
</html>

