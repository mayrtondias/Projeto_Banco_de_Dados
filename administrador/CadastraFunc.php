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
            <div style="border-radius:1em; width:20%; font-size:25px; background:#3300FF; border: 30px">
                <form action="ValidaFuncionario.php" method="post">
                    Informe os dos abaixo para cadastrar um novo cliente<br>
                    Nome:<br>
                    <input type="text" name="nome"><br>
                    Login:<br>
                    <input type="text" name="login"><br>
                    Senha:<br>
                    <input type="password" name="senha"><br>
                    Identidade:<br>
                    <input type="text" name="identidade"><br>
                    CPF:<br>
                    <input type="text" name="cpf"><br>
                    Salario:<br>
                    <input type="number" name="salario"><br>
                    Telefone:<br>
                    <input type="text" name="telefone"><br>
                    Cargo:<br>
                    <input type="text" name="cargo"><br>
                    <?php
                        if(isset($_SESSION['erro'])==TRUE){
                            $tipo=(int)$_SESSION['erro'];
                            switch ($tipo){
                                case 1:
                                    $men="O campo nome não deve ficar em branco<br>nem superior a 30 caracteres<br>";
                                    break;
                                case 2:
                                    $men="O campo Login não deve ficar em branco<br>nem superior a 15 caracteres<br>nem inferior à 8 caracteres<br>";
                                    break;
                                case 3:
                                    $men="O campo da senha não deve ficar em branco<br>nem superior a 15 caracteres.<br>";
                                    break;
                                case 4:
                                    $men="O campo da identidade não deve ficar em branco<br>nem superior a 15 caracteres.<br>";
                                    break;
                                case 5:
                                    $men="O campo do CPF não deve ficar em branco<br>nem superior a 14 caracteres<br>O formato desejado é xxx.xxx.xxx-xx<br>";
                                    break;
                                case 6:
                                    $men="O campo do salário não deve ficar em branco<br>e seu valor não deverá ser negativo<br>";
                                    break;
                                case 7:
                                    $men="O campo do Telefone não deve ficar em branco<br>nem superior a 14 caracteres<br>O formato desejado é (xx)xxxx-xxxx<br>";
                                    break;
                                case 8:
                                    $men="O campo Cargo não deve ficar em branco<br>nem superior a 20 caracteres<br>";
                                    break;
                                case 9:
                                    $men="Funcionário ja cadastrado no sistema<br>";
                                    break;
                                case 10:
                                    $men="Usuário ja cadastrado no sistema,<br>Informe um login distinto.<br>";
                                    break;
                                case 11:
                                    $men="O CPF desse funcionario ja esta cadastrado no sistema,<br>Informe um CPF distinto.<br>";
                                    break;
                                default :
                                    $men=" ";
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