<?php

require '../banco/Banco.php';

$banco = new banco();
session_start();

if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
    header('location: ../util/desconectado.php');
}

$chave = $_POST['chave'];

$tabela = "fornecedor";
$clausuraWere = "nome = '$chave'";

$resultado = $banco->deletar($tabela, $clausuraWere);

if ($resultado == NULL) {
    echo "Problema na exclusão.<br>";
} else {
    $_SESSION['mensagem'] = "1";
    header('location: mensagem.php');
}
?>