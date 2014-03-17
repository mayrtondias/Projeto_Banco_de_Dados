<?php

/* Essa e a classe responsavel pela criacao  e remocao das tabelas que 
 * estara contida no banco de dados GuaraGas, ou seja, aqui se encontra 
 * os metodos para conectar ao Banco, como tambem para criacao das tabelas.
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
                                                  CONSTRAINT nome PRIMARY KEY (nome),
                                                  UNIQUE (login)
                                                  );";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Administrador\n");
    }
    //metodo para criar a Tabela Administrador        
    public function criandoIndicesAdministrador() {
        
        $conexao=$this->conectarBanco();
        $tab_query = "CREATE INDEX nome_index ON administrador (nome);";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar o index da tabela Administrador\n");
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
                                                CONSTRAINT cpf PRIMARY KEY (cpf),
                                                datacon character varying(10) NOT NULL,
                                                datadem character varying(10),
                                                UNIQUE (login)
                                                );";
        
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Funcionario\n");
        
    }
    
    public function criandoIndicesFuncionario() {
        
        $conexao=$this->conectarBanco();
        $tab_query = "CREATE INDEX cpf_index ON funcionario (cpf);";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar o index da tabela Funcionario\n");
    }
    
    //apagando a tabela Funcionario
    public function apagarTabelaFuncionario() {
        $conexao=$this->conectarBanco();
        
        $tab_query = "DROP TABLE funcionario ;";
        
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel apagar a tabela Funcionario\n");
        
    }
    
    //criando a tabela Cliente
    public function criandoTabelaCliente() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE cliente (nome character varying(30) NOT NULL,
                                            contato character varying(14) NOT NULL,
                                            rua character varying(50) NOT NULL,
                                            bairro character varying(25) NOT NULL,
                                            numero integer NOT NULL,
                                            CONSTRAINT endereco PRIMARY KEY (rua, bairro, numero)
                                            );";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Cliente\n");
        
    }
    
    public function criandoIndicesCliente() {
        
        $conexao=$this->conectarBanco();
        $tab_query = "CREATE INDEX endereco_index ON cliente (rua, bairro, numero);";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar o index da tabela Cliente\n");
    }
    
    //apagando a tabela Cliente
    public function apagarTabelaCliente() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "DROP TABLE cliente ;";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel apagar a tabela Cliente\n");
        
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
    
    public function criandoIndicesProduto() {
        
        $conexao=$this->conectarBanco();
        $tab_query = "CREATE INDEX codigo_index ON produto (codProduto);";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar o index da tabela Produto\n");
    }
    
    //apagando a tabela Produto
    public function apagarTabelaProduto() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "DROP TABLE produto ;";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel apagar a tabela Produto\n");
        
    }
    
    //criando a tabela Venda
    public function criandoTabelaVenda() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE venda (data character varying(10) NOT NULL,
                                                hora character varying(8) NOT NULL,
                                                valor real NOT NULL,
                                                quantidade integer NOT NULL,
                                                codProduto integer NOT NULL REFERENCES produto(codProduto) ON DELETE CASCADE,
                                                status character varying(1) NOT NULL,
                                                CONSTRAINT ck_valor CHECK (valor >=0),
                                                CONSTRAINT horario PRIMARY KEY (data, hora))
                                                ;";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Venda\n");
        
    }
    
    public function criandoIndicesVenda() {
        
        $conexao=$this->conectarBanco();
        $tab_query = "CREATE INDEX horario_index ON venda (data, hora);";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar o index da tabela Venda\n");
    }
    
    //apagando a tabela Venda
    public function apagarTabelaVenda() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "DROP TABLE venda;";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel apagar a tabela Venda\n");
        
    }
    
    //criando a tabela Conta
    public function criandoTabelaConta() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE conta (data character varying(10) NOT NULL,
                                          hora character varying(8) NOT NULL,
                                          descricao character varying(50),
                                          valor real NOT NULL,
                                          CONSTRAINT ck_valor_conta CHECK (valor >=0),
                                          CONSTRAINT horario_conta PRIMARY KEY (data, hora));";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Conta\n");
        
    }
    
    public function criandoIndicesConta() {
        
        $conexao=$this->conectarBanco();
        $tab_query = "CREATE INDEX horario_conta_index ON conta (data, hora);";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar o index da tabela Conta\n");
    }
    
    //apagando a tabela Venda
    public function apagarTabelaConta() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "DROP TABLE conta;";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel apagar a tabela Conta\n");
        
    }
    
    public function criandoTabelaCompra() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE compra (data character varying(10) NOT NULL,
                                          hora character varying(8) NOT NULL,
                                          descricao character varying(50),
                                          valor real NOT NULL,
                                          quantidade integer NOT NULL,
                                          nome character varying(30) NOT NULL REFERENCES fornecedor(nome),
                                          codProduto integer NOT NULL REFERENCES produto(codProduto) ON DELETE CASCADE,
                                          CONSTRAINT ck_valor_compra CHECK (valor >=0),
                                          CONSTRAINT horario_compra PRIMARY KEY (data, hora)
                                          );";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Compra\n");
        
    }
    
    public function criandoIndicesCompra() {
        
        $conexao=$this->conectarBanco();
        $tab_query = "CREATE INDEX horario_compra_index ON compra (data, hora);";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar o index da tabela Compra\n");
    }
    
    //apagando a tabela Venda
    public function apagarTabelaCompra() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "DROP TABLE compra;";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel apagar a tabela Compra\n");
        
    }
    
    public function criandoTabelaFornecedor() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "CREATE TABLE fornecedor ( nome character varying(30) NOT NULL,
                                                contato character varying(14) NOT NULL,
                                                rua character varying(50) NOT NULL,
                                                bairro character varying(25) NOT NULL,
                                                numero integer NOT NULL,
                                                CONSTRAINT name PRIMARY KEY (nome)
                                                );";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela Fornecedor\n");
        
    }
    
    public function criandoIndicesFornecedor() {
        
        $conexao=$this->conectarBanco();
        $tab_query = "CREATE INDEX nome_For_index ON fornecedor (nome);";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar o index da tabela Fornecedor\n");
    }
    
    //apagando a tabela Venda
    public function apagarTabelaFornecedor() {
        
        $conexao=$this->conectarBanco();
        
        $tab_query = "DROP TABLE fornecedor;";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel apagar a tabela Fornecedor\n");
        
    }
    
    public function apagarBanco(){
        
        //Query para criar o banco de dado guaragas
        $criando_query = "DROP DATABASE guaragas ;";
        
        //Executando query para inserir o registro na tabela produto
        $res = pg_query($criando_query) or die("Não foi possivel apagar o banco de dados guaragas\n");
    }
    
}
