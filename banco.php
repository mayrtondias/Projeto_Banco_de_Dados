<?php

/*Essa e a classe responsavel pelas principais funcoes no bando de dados de 
 * GuaraGas, ou seja, aqui se encontra os metodos para conectar ao Banco,
 * inserir, alterar e deletar elementos do Banco de Dados
 */

class banco {

    public function __construct() {
        $conetar=$this->conectarBanco();
    }
    
    private function conectarBanco() {
        $host = "localhost";//host
        $db = "guaragas";  //nome do banco de dados
        $user = "postgres"; //usuario do banco de dados
        $passwd = "12345678"; //senha do banco de dados

        //Conectando ao banco de dados guaragas
        $conn = pg_connect("host=$host dbname=$db user=$user password=$passwd");
    
        return $conn;
    }
    
    public function inserirProduto($nome, $valor, $codigo){
        
        $conexao=$this->conectarBanco();
        
       //Query para inserir 1 registro na tabela
        $reg_query = "INSERT INTO produto  VALUES ('$nome',$valor,$codigo);";
        
        //Executando query para inserir o registro na tabela produto
        $res = pg_query($conexao, $reg_query) or die("Nao foi possivel executar a query: $reg_query \n");
        
    }
    
    public function inserirAdministrador($nome, $login, $senha){
        
        $conexao=$this->conectarBanco();
        
       //Query para inserir 1 registro na tabela administrador
        $reg_query = "INSERT INTO administrador  VALUES ('$nome','$login','$senha');";
        
        //Executando query para inserir o registro na tabela
        $res = pg_query($conexao, $reg_query) or die("Nao foi possivel executar a query: $reg_query \n");
        
    }
    
    public function inserirCliente($nome, $contato, $rua, $bairro, $numero){
        
        $conexao=$this->conectarBanco();
        
       //Query para inserir 1 registro na tabela administrador
        $reg_query = "INSERT INTO cliente  VALUES ('$nome','$contato','$rua','$bairro',$numero);";
        
        //Executando query para inserir o registro na tabela
        $res = pg_query($conexao, $reg_query) or die("Nao foi possivel executar a query: $reg_query \n");
        
    }
    
    public function inserirVenda($valor, $quantidade, $codigoProduto){
        
        $conexao=$this->conectarBanco();
        $data="j";
        $hora="jh";
       //Query para inserir 1 registro na tabela administrador
        $reg_query = "INSERT INTO venda  VALUES ('$data','$hora', $valor, $quantidade, $codigoProduto);";
        
        //Executando query para inserir o nregistro na tabela
        $res = pg_query($conexao, $reg_query) or die("Nao foi possivel executar a query: $reg_query \n");
        
    }
}

