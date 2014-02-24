<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guaragas</title>
    </head>
     
    <body>
        <center>
            <div style="border-radius:1em; width:20%; font-size:25px; background:#3399FF; margin: 15%">
                <form action="valida.php" method="post">
                    <label style="color:white; font-family:arial; text-decoration:none; padding:5px">Login:</label><br>
                    <input type="text" name="login"><br>
                    <label style="color:white; font-family:arial; text-decoration:none; padding:5px">Senha:</label><br>
                    <input type="password" name="senha"><br>
                    
                    <label style="color:red; font-family:arial; text-decoration:none; padding:5px; font-size: 14px">
                        
                        <b>Atenção: Não foi possivel validar seu acesso!
                        Caso você seja um usuario cadastrado verifique seu Login e Senha,
                        Caso contrário, entre em contato com o Administrador.
                        </b>
                    </label><br>
                    <input type="submit" value="Entrar">
                </form>
            </div>
        </center>
    </body>
</html>