<?php

require '../banco/Banco.php';

$banco = new banco();
session_start();

if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
    header('location: ../util/desconectado.php');
}

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$identidade = $_POST['identidade'];
$cpf = $_POST['cpf'];
$salario = $_POST['salario'];
$telefone = $_POST['telefone'];
$cargo = $_POST['cargo'];
$datacon = $_POST['datacon'];
$usuarioCadastrado = "f";
$funcionarioCadastrado = "f";
$cpfCadastrado = "f";
$_SESSION['erro'] = "";

$tabela = "funcionario";
$pesquisa = "*";

$resultado = $banco->pesquisar($pesquisa, $tabela);

if ($resultado == NULL) {
    unset($_SESSION['erro']);
    $_SESSION['mensagem'] = "301";
    header('location: mensagem.php');
} else {
    while ($registro = pg_fetch_array($resultado)) {
        if ($registro['cpf'] === $cpf) {
            $cpfCadastrado = "t";
        }
        if ($registro['login'] === $login) {
            $funcionarioCadastrado = "t";
        }
    }
}

$tabela = "administrador";
$pesquisa = "*";

$resultado = $banco->pesquisar($pesquisa, $tabela);

if ($resultado == NULL) {
    unset($_SESSION['erro']);
    $_SESSION['mensagem'] = "300";
    header('location: mensagem.php');
} else {
    while ($registro = pg_fetch_array($resultado)) {
        if ($registro['login'] === $login) {
            $usuarioCadastrado = "t";
        }
    }
}

if (($nome === "") || (strlen($nome) > 30)) {
    $_SESSION['erro'] = "1";
} else if (($login === "") || (strlen($login) > 15)) {
    $_SESSION['erro'] = "2";
} else if (($senha === "") || (strlen($senha) > 15)) {
    $_SESSION['erro'] = "3";
} else if (($identidade === "") || (strlen($identidade) > 15)) {
    $_SESSION['erro'] = "4";
} else if (($cpf === "") || (strlen($cpf) > 14)) {
    $_SESSION['erro'] = "5";
} else if (($salario === "") || (((float) $salario) < 0)) {
    $_SESSION['erro'] = "6";
} else if (($telefone === "") || (strlen($telefone) > 14)) {
    $_SESSION['erro'] = "7";
} else if (($cargo === "") || (strlen($cargo) > 20)) {
    $_SESSION['erro'] = "8";
} else if ($funcionarioCadastrado === "t") {
    $_SESSION['erro'] = "9";
} else if ($usuarioCadastrado === "t") {
    $_SESSION['erro'] = "10";
} else if ($cpfCadastrado === "t") {
    $_SESSION['erro'] = "11";
} else if (($datacon === "") || (strlen($datacon) != 10)) {
    $_SESSION['erro'] = "12";
}

if ($_SESSION['erro'] === "") {
    $banco->inserirFuncionario($cpf, $nome, $identidade, $login, $senha, (float) $salario, $telefone, $cargo, $datacon, null);
    unset($_SESSION['erro']);
    $_SESSION['mensagem'] = "1";
    header('location: mensagem.php');
} else {
    header('location: CadastraFunc.php');
}
?>