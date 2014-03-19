<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas </title>
        <link rel="stylesheet" type="text/css" href="../estilos/Padrao.css" media="all"/>
    </head>

    <body>
        <div id="tres">
            <form method="POST" action="SelecionarProduto.php" onsubmit="return confirm('Voce tem certeza?');">
                <table>
                    <tr>
                        <td>Nome</td>
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

                    $rua = $_POST['pesquisarRua'];      
                    $_SESSION['erro']="";
                    $tabela="cliente";
                    $pesquisa="*";

                    if(($nome==="")||(strlen($nome)>50)){
                        $_SESSION['erro']="2";
                        header('location: Vendas.php');
                    }

                    $resultado=$banco->pesquisar($pesquisa, $tabela);

                    if($resultado==NULL){
                        echo "Problema na pesquisa<br>";
                    } else{
                          while($registro = pg_fetch_array($resultado)){

                              if($registro['rua']===$rua){
                                  ?>
                                  <tr>
                                    <td><?php echo $registro['nome']; ?></td>
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



