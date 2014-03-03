<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guaragas</title>
    </head>
     
    <body>
        
        <?php
        
            session_start();
            
            if( ( isset($_POST['login']) == FALSE)||( isset($_POST['senha']) == FALSE) ){
                
            }else{
                $login = $_POST['login'];      
                $senha = $_POST['senha'];
                
                if(($login==="prog")&&($senha==="123")){
                    $_SESSION['login']=$login;
                    $_SESSION['senha']=$senha;
                    header('location: ../programador/ProgramadorHome.php');
                }else{
                    $_SESSION['erro']=TRUE;
                }
            }
        ?>
        
        <center>
            <div  style="border-radius:1em; width:20%; font-size:25px; background:#33aa00; margin: 15%">
                <form action="IndexProg.php" method="post">
                    <label style="color:white; font-family:arial; text-decoration:none; padding:5px">Login:</label><br>
                    <input type="text" name="login"><br>
                    <label style="color:white; font-family:arial; text-decoration:none; padding:5px">Senha:</label><br>
                    <input type="password" name="senha"><br>
                    <?php
                        if(isset($_POST['erro']) == TRUE){
                            if($_SESSION['erro']==TRUE){
                                echo '<label style="color:red; font-family:arial; text-decoration:none; padding:5px">Errou!</label><br>';
                        
                            }
                        }
                    ?>
                    <input type="submit" value="Entrar">
                </form>
            </div>
        </center>
    </body>
</html>
