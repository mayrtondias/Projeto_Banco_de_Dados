<?php

/*Essa e a classe responsavel pelas principais funcoes no bando de dados de 
 * GuaraGas, ou seja, aqui se encontra os metodos para conectar ao Banco,
 * inserir, alterar e deletar elementos do Banco de Dados
 */

class banco {
    
    private $conexao=null;
    
    public function __construct() {
        $this->conectarBanco();
    }

    public function conectarBanco() {
        $host="localhost";
        
        $conexao = pg_connect("host=localhost dbname=postgres user=postgres  password=12345678 port=5432") or die ('Erro  ao conectar com o servidor'); 
    
        
    }
    
    public function inserir() {
        
        $reg_query = "INSERT INTO teste (nome, senha) VALUES ('Vinicius', 10);";
        $res = pg_query($conexao, $reg_query) or die("Nao foi possivel executar a query: $reg_query\n");
    
    }
}

/*
$conn = pg_connect("host=localhost dbname=postgres user=postgres  password=12345678 port=5432") or die ('Erro  ao conectar com o servidor');
            $reg_query = "INSERT INTO teste (nome, senha) VALUES ('Vinicius', 10);";
            $res = pg_query($conn, $reg_query) or die("Nao foi possivel executar a query: $reg_query\n");
            */