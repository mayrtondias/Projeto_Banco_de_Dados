<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
    </head>

    <body>
        <?php
            require 'MenuFuncionario.php';
        ?>
        <div style="border-radius:1em; width:70%; font-size:25px; background:#3300FF; border: 30px; margin: 15px; float: left">
            <center>
                <form method="POST" action="ClienteValDelete.php" >
                    <?php

                    require '../banco/Banco.php';

                    $banco=new banco();
                    session_start();

                    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
                        header('location: ../util/desconectado.php');
                    }
                    
                    $tabela="cliente";
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
                                <td>Contato</td>
                                <td>Rua</td>
                                <td>Bairro</td>
                                <td>Número</td>
                                <td>Excluir</td>
                            </tr>
                        <?php
                        $contador=0;
                        if( isset($_POST['selecionado'])==false){
                            $qtdeResult=0;
                        }else {
                            if( isset($_POST['pagina'])==true){
                                $qtdeResult=$_POST['pagina'];
                            }
                            if(($_POST['selecionado']==="anterior")||($qtdeResult>1)){
                                --$qtdeResult;
                            }else if($_POST['selecionado']==="proximo"){
                                    ++$qtdeResult;
                            }else $qtdeResult=0;
                        }
                        while($registro = pg_fetch_array($resultado)){
                              
                            if(($contador>=($qtdeResult*10))&&($contador<($qtdeResult*10+10))){
                                  ?>
                                  <tr>
                                    <td><?php echo ($contador+1); ?></td>
                                    <td><?php echo $registro['nome']; ?></td>
                                    <td><?php echo $registro['contato']; ?></td>
                                    <td><?php echo $registro['rua']; ?></td>
                                    <td><?php echo $registro['bairro']; ?></td>
                                    <td><?php echo $registro['numero']; ?></td>
                                    <td><button type="submit" name="chave" value="<?php echo "".$registro['rua']."§".$registro['bairro']."§".$registro['numero'].""; ?>" >OK</button></td>
                                  </tr>
                                <?php
                                
                              }
                              ++$contador;
                          }
                      }
            ?>
                </table>
                </form>
                <form method="POST" action="ClienteDelete.php" >
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
                   <input type="hidden" name="pagina" value="<?php echo $qtdeResult; ?>"><br>
             </form>
                </center>
        </div>
            
    </body>
</html>
