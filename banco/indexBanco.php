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
        <center>
            <div  style="border-radius:1em; width:20%; font-size:25px; background:#3399FF">
                <?php
                    
                    require '../banco/banco.php';

                    $banco=new banco();
                    
                    $banco->criandoBanco("felipe");
                    echo 'ok';
                ?>
            </div>
        </center>
    </body>
</html>


