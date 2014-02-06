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
    
    public function criandoBanco(){
        
        echo "Inciciando a criação do Banco de Dados Guaragas<br>";
        
        //Query para criar o banco de dado guaragas
        $criando_query = "CREATE DATABASE guaragas0;";
        
        //Executando query para inserir o registro na tabela produto
        $res = pg_query($criando_query) or die("Não foi possivel criar o banco de dados guaragas\n");
        
        echo "O Banco de Dados Guaragas foi criado com exito<br>";
        echo "Iniciando a conexao<br>";
        
        $host = "localhost";//host
        $nomeBD = "guaragas0";  //nome do banco de dados
        $user = "postgres"; //usuario do banco de dados
        $passwd = "12345678"; //senha do banco de dados

        //Conectando ao banco de dados guaragas
        $conexao = pg_connect("host=$host dbname=$nomeBD user=$user password=$passwd");
        
        echo "Conexao estabelecida<br>";
        echo "Iniciando a criação da tabela administrador<br>";
        
        $tab_query = "CREATE TABLE pessoa ( idpessoa integer PRIMARY KEY, nome text);";
        $res = pg_query($conexao,$tab_query) or die("Nao foi possivel criar a tabela ".$nomeBD."\n");
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

