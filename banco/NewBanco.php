<?php

/* Essa e a classe responsavel pela criacao das tabelas que estara contida 
 * no banco de dados GuaraGas, ou seja, aqui se encontra os metodos para 
 * conectar ao Banco, como tambem para criacao das tabelas.
 */

class NewBanco {
    
    //construtor da Classe
    public function __construct() {
        $conetar=$this->conectarBancoPostgres();
    }
    
    //metodo para connectar o Banco de Dados
    private function conectarBancoPostgres() {
        $host = "localhost";    //host
        $db = "postgres";       //nome do banco de dados
        $user = "postgres";     //usuario do banco de dados
        $passwd = "12345678";   //senha do banco de dados

        //Conectando ao banco de dados guaragas
        $conn = pg_connect("host=$host dbname=$db user=$user password=$passwd");
    
        return $conn;
    }
    
    //metodo para connectar o Banco de Dados
    private function conectarBanco() {
        $host = "localhost";    //host
        $db = "guaragas";       //nome do banco de dados
        $user = "postgres";     //usuario do banco de dados
        $passwd = "12345678";   //senha do banco de dados

        //Conectando ao banco de dados guaragas
        $conn = pg_connect("host=$host dbname=$db user=$user password=$passwd");
    
        return $conn;
    }
    
    //metodo para criacao do Banco de Dados
    public function criandoBanco(){
        
        //Query para criar o banco de dado guaragas
        $criando_query = "CREATE DATABASE guaragas ;";
        
        //Executando query para inserir o registro na tabela produto
        $res = pg_query($criando_query) or die("Não foi possivel criar o banco de dados guaragas\n");
    
    }
    
    //metodo para criar a Tabela Administrador        
    public function criandoTabelaAdministrador() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE administrador (nome character varying(50) NOT NULL,
                                                  login character varying(15) UNIQUE NOT NULL,
                                                  senha character varying(15) NOT NULL,
                                                  CONSTRAINT nome PRIMARY KEY (nome));";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Administrador\n");
    }
    
    //metodo para apagar a Tabela Administrador        
    public function apagarTabelaAdministrador() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "DROP TABLE administrador;";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel apagar a tabela Administrador\n");
    }
    
    //criando a tabela Funcionario
    public function criandoTabelaFuncionario() {
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE funcionario (cpf character varying(14) NOT NULL,
                                                nome character varying(30) NOT NULL,
                                                identidade character varying(15) NOT NULL,
                                                login character varying(15) NOT NULL,
                                                senha character varying(15) NOT NULL,
                                                salario real NOT NULL,
                                                telefone character varying(14) NOT NULL,
                                                cargo character varying(20) NOT NULL,
                                                CONSTRAINT cpf PRIMARY KEY (cpf));";
        
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Funcionario\n");
        
    }
    
    //criando a tabela Cliente
    public function criandoTabelaCliente() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE cliente (nome character varying(30) NOT NULL,
                                            contato character varying(14) NOT NULL,
                                            rua character varying(50) NOT NULL,
                                            bairro character varying(25) NOT NULL,
                                            numero integer NOT NULL,
                                            CONSTRAINT endereco PRIMARY KEY (rua, bairro, numero));";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Cliente\n");
        
    }
    
    //criando a tabela Produto
    public function criandoTabelaProduto() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE produto (nome character varying(50) NOT NULL,
                                            valor real NOT NULL,
                                            quantidade integer NOT NULL,
                                            codProduto integer NOT NULL,
                                            CONSTRAINT codigoProduto PRIMARY KEY (codProduto),
                                            CONSTRAINT ck_qtde CHECK (quantidade >=0),
                                            CONSTRAINT ck_valor CHECK (valor >= 0 ));";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Produto\n");
        
    }
    
    //criando a tabela Venda
    public function criandoTabelaVenda() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE venda (data character varying(10) NOT NULL,
                                                hora character varying(8) NOT NULL,
                                                valor real NOT NULL,
                                                quantidade integer NOT NULL,
                                                codProduto integer NOT NULL,
                                                status character varying(1) NOT NULL,
                                                CONSTRAINT ck_valor CHECK (valor >=0),
                                                CONSTRAINT horario PRIMARY KEY (data, hora));";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Venda\n");
        
    }
    
    public function apagarBanco(){
        
        //Query para criar o banco de dado guaragas
        $criando_query = "DROP DATABASE guaragas ;";
        
        //Executando query para inserir o registro na tabela produto
        $res = pg_query($criando_query) or die("Não foi possivel apagar o banco de dados guaragas\n");
    }
    
    
}
