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
            <div>
                <form action="ValidaProduto.php" method="post">
                    Informe os dos abaixo para cadastrar um novo cliente<br>
                    Nome:<br>
                    <input type="text" name="nome"><br>
                    Valor:<br>
                    <input type="number" name="valor"><br>
                    Codigo do produto:<br>
                    <input type="number" name="codProduto"><br>
                    Quantidade:<br>
                    <input type="number" name="quantidade"><br>
                        <?php
                            if(isset($_SESSION['erro'])==TRUE){
                                $tipo=(int)$_SESSION['erro'];
                                switch ($tipo){
                                    case 1:
                                        $men="O campo nome não deve ficar em branco<br>nem superior a 50 caracteres<br>";
                                        break;
                                    case 2:
                                        $men="O campo Valor não deve ficar em branco<br>nem ser um valor negativo<br>";
                                        break;
                                    case 3:
                                        $men="O campo Codigo do Produto não deve ficar em branco<br>nem ser um valor negativo.<br>";
                                        break;
                                    case 4:
                                        $men="O campo Quantidade não deve ficar em branco<br>nem ser um valor negativo<br>";
                                        break;
                                    case 5:
                                        $men="Produto ja cadastrado no sistema<br>";
                                        break;
                                    default :
                                        $men="";
                                }
                                echo $men;
                            }
                         ?>
                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </center>
    </body>
</html>