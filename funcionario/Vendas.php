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
            require 'MenuFuncionario.php';
        ?>
        
        <center>
            <div>
                <form action="vendaPesquisarClienteNome.php" method="post">
                    
                    Pesquisar por nome:<br>
                    <input type="text" name="pesquisarNome"><br>
                    <?php
                        if(isset($_SESSION['erro'])==TRUE){
                            $tipo=(int)$_SESSION['erro'];
                            switch ($tipo){
                                case 1:
                                    $men="O campo nome não deve ficar em branco<br>nem superior a 30 caracteres<br>";
                                    break;
                                default :
                                    $men="";
                            }
                            echo $men;
                        }
                    ?>
                    <input type="submit" value="Pesquisar">
                </form>
            </div>
            
            <div>
                <form action="VendaPesquisarClienteRua.php" method="post">
                    
                    Pesquisar por rua:<br>
                    <input type="text" name="pesquisarRua"><br>
                    <?php
                        if(isset($_SESSION['erro'])==TRUE){
                            $tipo=(int)$_SESSION['erro'];
                            switch ($tipo){
                                case 2:
                                    $men="O campo da rua não deve ficar em branco<br>nem superior a 50 caracteres.<br>";
                                    break;
                                default :
                                    $men="";
                            }
                            echo $men;
                        }
                    ?>
                    <input type="submit" value="Pesquisar">
                </form>
            </div>
        </center>
    </body>
</html>