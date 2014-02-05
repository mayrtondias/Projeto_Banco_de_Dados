<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
    </head>
     
    <body>
        <?php
            require 'menuAdministrador.php';
        ?>
        
        <center>
            <div>
                <form action="validaFuncionario.php" method="post">
                    Informe os dos abaixo para cadastrar um novo cliente<br>
                    Nome:<br>
                    <input type="text" name="nome"><br>
                    Login:<br>
                    <input type="text" name="login"><br>
                    Senha:<br>
                    <input type="text" name="senha"><br>
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
                                    $men="O campo nome não deve ficar em branco<br>nem superior a 50 caracteres<br>";
                                    break;
                                case 2:
                                    $men="O campo Login não deve ficar em branco<br>nem superior a 15 caracteres<br>nem inferior à 8 caracteres<br>";
                                    break;
                                case 3:
                                    $men="O campo da senha não deve ficar em branco<br>nem superior a 15 caracteres.<br>";
                                    break;
                                case 4:
                                    $men="Administrador ja cadastrado no sistema<br>";
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