<?php
    $host = "localhost";//host
    $db = "guaragas";  //nome do banco de dados
    $user = "postgres"; //usuario do banco de dados
    $passwd = "12345678"; //senha do banco de dados

    //Conectando ao banco de dados utilizando a funcao pg_connect
    $conn = pg_connect("host=$host dbname=$db user=$user password=$passwd");
    //Query para criar uma tabela no banco de dados
    $table_query = "CREATE TABLE usuarios(id serial NOT NULL, nome VARCHAR(64), PRIMARY KEY(id));";
    //Query para inserir 1 registro na tabela
    $reg_query = "INSERT INTO usuarios (nome) VALUES ('Vinicius');";
    //Query para listar registros da tabela
    $show_query = "SELECT * FROM usuarios";

    
    //Executando query para criar a tabela no banco de dados
    $res = pg_query($conn, $table_query) or die("Nao foi possivel executar a query: $table_query\n");
    //Executando query para inserir o registro na tabela
    $res = pg_query($conn, $reg_query) or die("Nao foi possivel executar a query: $reg_query\n");
    //Executando query para listar os registros da tabela
    $res = pg_query($conn, $show_query) or die("Nao foi possivel executar a query: $reg_query\n");

    //Exibindo dados
    while ($linha = pg_fetch_row($res)) {
        foreach($linha as $dado)
        echo $dado . "\n";
    }
   ?>