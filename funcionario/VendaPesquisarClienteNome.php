<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
    </head>

    <body>
        <div>
            <form method="POST" action="selecionarProduto.php" onsubmit="return confirm('Voce tem certeza?');">
                <table>
                    <tr>
                        <td>Rua</td>
                        <td>Bairro</td>
                        <td>Rua</td>
                        <td>Contato</td>
                        <td>Selecionar</td>
                    </tr>
                <?php

                    require '../banco/Banco.php';

                    $banco=new banco();
                    session_start();

                    if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
                        header('location: ../util/desconectado.php');
                    }

                    $nome = $_POST['pesquisarNome'];      
                    $_SESSION['erro']="";
                    $tabela="cliente";
                    $pesquisa="*";

                    if(($nome==="")||(strlen($nome)>30)){
                        $_SESSION['erro']="1";
                        header('location: Vendas.php');
                    }

                    $resultado=$banco->pesquisar($pesquisa, $tabela);

                    if($resultado==NULL){
                        echo "Problema na pesquisa<br>";
                    } else{
                          while($registro = pg_fetch_array($resultado)){

                              if($registro['nome']===$nome){
                                  ?>
                                  <tr>
                                    <td><?php echo $registro['rua']; ?></td>
                                    <td><?php echo $registro['bairro']; ?></td>
                                    <td><?php echo $registro['numero']; ?></td>
                                    <td><?php echo $registro['contato']; ?></td>
                                    <td><button type="submit" name="selecionado" value="<?php echo $registro['rua']."§".$registro['bairro']."§".$registro['numero']; ?>" >OK</button></td>
                                </tr>
                                <?php
                              }
                          }
                     }


            ?>
                </table>
            </form>
        </div>
    </body>
</html>

