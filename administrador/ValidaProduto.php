<?php

require '../banco/banco.php';

$banco = new banco();
session_start();

if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
    header('location: ../util/desconectado.php');
}

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$codProduto = $_POST['codProduto'];
$quantidade = $_POST['quantidade'];
$administradorCadastrado = "f";
$_SESSION['erro'] = "";

$tabela = "produto";
$pesquisa = "*";

$resultado = $banco->pesquisar($pesquisa, $tabela);

if ($resultado == NULL) {
    echo "Problema na pesquisa<br>";
} else {
    while ($registro = pg_fetch_array($resultado)) {
        if ($registro['codProduto'] === $codProduto) {
            $produtoCadastrado = "t";
        }
    }
}

if (($nome === "") || (strlen($nome) > 50)) {
    $_SESSION['erro'] = "1";
} else if (($valor === NULL) || ($valor < 0)) {
    $_SESSION['erro'] = "2";
} else if (($codProduto === NULL) || ($valor < 0)) {
    $_SESSION['erro'] = "3";
} else if (($quantidade === NULL) || ($valor < 0)) {
    $_SESSION['erro'] = "4";
} else if ($produtoCadastrado === "t") {
    $_SESSION['erro'] = "5";
}

if ($_SESSION['erro'] === "") {
    $banco->inserirProduto($nome, $valor, $codProduto, $quantidade);
    unset($_SESSION['erro']);
    $_SESSION['mensagem'] = "1";
    header('location: mensagem.php');
} else {
    header('location: HomeAdmin.php');
}
?>
