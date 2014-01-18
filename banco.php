<?php

/*Essa e a classe responsavel pelas principais funcoes no bando de dados de 
 * GuaraGas, ou seja, aqui se encontra os metodos para conectar ao Banco,
 * inserir, alterar e deletar elementos do Banco de Dados
 */

class banco {

    public function __construct() {
        $conetar=$this->conectarBanco();
    }
    
    public function conectarBanco() {
        $host = "localhost";//host
        $db = "guaragas";  //nome do banco de dados
        $user = "postgres"; //usuario do banco de dados
        $passwd = "12345678"; //senha do banco de dados

        //Conectando ao banco de dados guaragas
        $conn = pg_connect("host=$host dbname=$db user=$user password=$passwd");
    
        return $conn;
    }
    
    public function inserir() {
        
       //Query para inserir 1 registro na tabela
        $reg_query = "INSERT INTO produto (nome, valor, codProduto) VALUES ('ton',0,0);";
        
        
        //Executando query para inserir o registro na tabela
        $res = pg_query($this->conectarBanco(), $reg_query) or die("Nao foi possivel executar a query: $reg_query\n");
    }
}

