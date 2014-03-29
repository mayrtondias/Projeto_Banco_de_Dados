<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
    </head>

    <body>
        <div id="tres">
            <form method="POST" action="ValidaVenda.php" onsubmit="return confirm('Voce tem certeza?');">
                <table>
                    <tr>
                        <td>Nome</td>
                        <td>Valor</td>
                        <td>Codigo</td>
                        <td>Quantidade Maxima</td>
                        <td>Quantidade da Compra</td>
                        <td>Selecionar</td>
                    </tr>

                    <?php
                    require '../banco/Banco.php';

                    $banco = new banco();
                    session_start();

                    if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
                        header('location: ../util/desconectado.php');
                    }


                    $chave = explode("§", $_POST['selecionado']);
                    $rua = $chave[0];
                    $bairro = $chave[1];
                    $numero = $chave[2];

                    $_SESSION['rua'] = $rua;
                    $_SESSION['bairro'] = $bairro;
                    $_SESSION['numero'] = $numero;

                    $tabela = "produto";
                    $pesquisa = "*";

                    $resultado = $banco->pesquisar($pesquisa, $tabela);

                    if ($resultado == NULL) {
                        echo "Problema na pesquisa.<br>";
                    } else {
                        while ($registro = pg_fetch_array($resultado)) {
                            ?>
                            <tr>
                                <td><?php echo $registro['nome']; ?></td>
                                <td><?php echo $registro['valor']; ?></td>
                                <td><?php echo $registro['codproduto']; ?></td>
                                <td><?php echo $registro['quantidade']; ?></td>

                                <td><input id="teste" type="text" name="teste[]"><br></td>
                                <td><button type="submit" name="codigo" value="<?php echo $registro['codproduto']; ?>" >OK</button></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>







