<?php

/* Essa e a classe responsavel pelas principais funcoes no bando de dados de 
 * GuaraGas, ou seja, aqui se encontra os metodos para conectar ao Banco,
 * inserir, alterar e deletar elementos do Banco de Dados
 */

class banco {
    
    //construtor da Classe
    public function __construct() {
        $conetar=$this->conectarBanco();
    }
    
    //metodo para connectar o Banco de Dados
    private function conectarBanco() {
        $host = "localhost"; //host
        $db = "guaragas";   //nome do banco de dados
        $user = "postgres"; //usuario do banco de dados
        $passwd = "12345678"; //senha do banco de dados

        //Conectando ao banco de dados guaragas
        $conn = pg_connect("host=$host dbname=$db user=$user password=$passwd");
    
        return $conn;
    }
    
    //metodo para criacao do Banco de Dados
    public function criandoBanco(){
        
        //Query para criar o banco de dado guaragas
        $criando_query = "CREATE DATABASE guaragas;";
        
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
                                            CONSTRAINT codigoProduto PRIMARY KEY (codProduto));";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Produto\n");
        
    }
    
    //criando a tabela Venda
    public function criandoTabelaVenda() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE funcionario (data character varying(10) NOT NULL,
                                                hora character varying(8) NOT NULL,
                                                valor real NOT NULL,
                                                quantidade integer NOT NULL,
                                                codProduto integer NOT NULL,
                                                status character varying(1) NOT NULL,
                                                CONSTRAINT horario PRIMARY KEY (data, hora));";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Venda\n");
        
    }
    
    public function inserirProduto($nome, $valor, $codigo,$quantidade){
        
        $conexao=$this->conectarBanco();
        
       //Query para inserir 1 registro na tabela
        $reg_query = "INSERT INTO produto  VALUES ('$nome',$valor,$codigo,$quantidade);";
        
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
    
    public function inserirVenda($valor, $quantidade, $codigoProduto, $status){
        
        $conexao=$this->conectarBanco();
        $data=  date($d);
        $hora="jh";
       //Query para inserir 1 registro na tabela administrador
        $reg_query = "INSERT INTO venda  VALUES ('$data','$hora', $valor, $quantidade, $codigoProduto, '$status');";
        
        //Executando query para inserir o nregistro na tabela
        $res = pg_query($conexao, $reg_query) or die("Nao foi possivel executar a query: $reg_query \n");
        
    }
    
    public function inserirFuncionario($cpf, $nome, $identidade, $login, $senha, $salario, $telefone, $cargo){
        
        $conexao=$this->conectarBanco();
        
       //Query para inserir 1 registro na tabela administrador
        $reg_query = "INSERT INTO funcionario  VALUES ('$cpf','$nome','$identidade','$login','$senha',$salario,'$telefone','$cargo');";
        
        //Executando query para inserir o registro na tabela
        $res = pg_query($conexao, $reg_query) or die("Nao foi possivel executar a query: $reg_query \n");
        
    }
        
    public function pesquisar($pesquisa, $tabela){
        
        $conexao=$this->conectarBanco();
        
        //Query para listar registros da tabela
        $show_query = "SELECT $pesquisa FROM $tabela";
        
        //Executando query para listar os registros da tabela
        $res = pg_query($conexao, $show_query) or die("Nao foi possivel executar a sua pesquisa!\n");
        
        return $res;
    }
    
    
    
}

