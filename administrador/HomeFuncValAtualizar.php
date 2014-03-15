<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuaraGas</title>
        <link rel="stylesheet" type="text/css" href="../estilos/Padrao.css" media="all"/>
    </head>
     
    <body>
        
        <?php
            require 'MenuAdministrador.php';
            require '../banco/Banco.php';
            
            session_start();
 
            if( ( isset($_SESSION['login']) == FALSE)||( isset($_SESSION['senha']) == FALSE) ){
                header('location: ../util/desconectado.php');
            }
            
            $banco=new Banco();
            
            $chave= $_POST['chave'];
            $tabela="funcionario";
            $pesquisa="*";
           
            $resultado=$banco->pesquisar($pesquisa, $tabela);

            if($resultado==NULL){
                echo "Problema na pesquisa.<br>";
            }else{
                while($registro = pg_fetch_array($resultado)){
                    if($registro['cpf']===$chave){
                        $_SESSION['atualNome']=$registro['nome'];
                        $_SESSION['atualLogin']=$registro['login'];
                        $_SESSION['atualCpf']=$registro['cpf'];
                        $_SESSION['atualSenha']=$registro['senha'];
                        $_SESSION['atualIdentidade']=$registro['identidade'];
                        $_SESSION['atualSalario']=$registro['salario'];
                        $_SESSION['atualTelefone']=$registro['telefone'];
                        $_SESSION['atualCargo']=$registro['cargo'];
                        break;
                    }
                }
            }
        ?>
        
        <center>
            <div id="tres">
                <form action="ValidaFuncValAtualizarExec.php" method="post">
                    Informe os dos abaixo para cadastrar um novo cliente<br>
                    Nome:<br>
                    <input type="text" name="nome" value="<?php echo $_SESSION['atualNome']; ?>"><br>
                    Login:<br>
                    <input type="text" name="login" value="<?php echo $_SESSION['atualLogin']; ?>"><br>
                    Senha:<br>
                    <input type="password" name="senha" value="<?php echo $_SESSION['atualSenha']; ?>"><br>
                    Identidade:<br>
                    <input type="text" name="identidade" value="<?php echo $_SESSION['atualIdentidade']; ?>"><br>
                    CPF:<br>
                    <input type="text" name="cpf" value="<?php echo $_SESSION['atualCpf']; ?>"><br>
                    Salario:<br>
                    <input type="text" name="salario" value="<?php echo $_SESSION['atualSalario']; ?>"><br>
                    Telefone:<br>
                    <input type="text" name="telefone" value="<?php echo $_SESSION['atualTelefone']; ?>"><br>
                    Cargo:<br>
                    <input type="text" name="cargo" value="<?php echo $_SESSION['atualCargo']; ?>"><br>
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
                                    $men="O campo da senha não deve ficar em branco<br>nem inferior a 8 caracteres ou superior a 15 caracteres.<br>";
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
                                case 30:
                                    $men="Ja existe um Adminitrador com esse nome.<br>";
                                    break;
                                case 31:
                                    $men="Ja existe um Adminitrador com esse Login.<br>";
                                    break;
                                case 32:
                                    $men="Aconteceu um erro, digite a senha novamente!<br>";
                                    break;
                                default :
                                    $men=" ";
                            }
                            echo $men;
                        }
                    ?>
                    <input type="submit" value="Atualizar">
                </form>
            </div>
        </center>
    </body>
</html>