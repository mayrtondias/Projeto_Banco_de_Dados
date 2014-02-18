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
        
        <center>
            <div style="border-radius:1em; width:45%; font-size:25px; background:#3300FF;border: 30px">
                <form action="ValidaCliente.php" method="post">
                    Informe os dos abaixo para cadastrar um novo cliente <br>
                    Nome:<br>
                    <input type="text" name="nome"><br>
                    Contato:<br>
                    <input type="text" name="contato"><br>
                    Rua:<br>
                    <input type="text" name="rua"><br>
                    Bairro:<br>
                    <input type="text" name="bairro"><br>
                    Numero:<br>
                    <input type="number" name="numero"><br>
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
                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </center>
    </body>
</html>