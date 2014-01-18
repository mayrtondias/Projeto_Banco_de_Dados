<html>
    <head>
        <title>GuaraGas</title>
    </head>
   
    <body>
        <?php
        
        require 'banco.php';
           
            session_start();
           
            $banco=new banco(); 
            
            $banco->inserir();
            echo"sim";
        ?>
    </body>
</html>
