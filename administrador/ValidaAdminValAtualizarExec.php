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
$_SESSION['erro'] = "";


$tabela = "administrador";

if (($nome === "") || (strlen($nome) > 50)) {
    $_SESSION['erro'] = "1";
} else if (($login === "") || (strlen($login) > 15)) {
    $_SESSION['erro'] = "2";
} else if (($senha === "") || (strlen($senha) > 15) || (strlen($senha) < 8)) {
    $_SESSION['erro'] = "3";
}


if ($_SESSION['erro'] === "") {

    $nomeAtual = $_SESSION['atualNome'];
    $clausuraWere = "nome = '$nomeAtual'";

    if ($nome !== $_SESSION['atualNome']) {
        $clausuraSET = "nome = '$nome' ";
        $resultado = $banco->update($tabela, $clausuraSET, $clausuraWere);
        if ($resultado == NULL)
            $_SESSION['erro'] = "30";
    }

    $clausuraWere = "nome = '$nome'";
    if ($login !== $_SESSION['atualLogin']) {
        $clausuraSET = "login = '$login' ";
        $resultado = $banco->update($tabela, $clausuraSET, $clausuraWere);
        if ($resultado == NULL)
            $_SESSION['erro'] = "31";
    }

    if ($senha !== $_SESSION['atualSenha']) {
        $clausuraSET = "senha = '$senha' ";
        $resultado = $banco->update($tabela, $clausuraSET, $clausuraWere);
        if ($resultado == NULL)
            $_SESSION['erro'] = "32";
    }

    if ($_SESSION['erro'] === "") {
        unset($_SESSION['erro']);
        unset($_SESSION['atualNome']);
        unset($_SESSION['atualLogin']);
        unset($_SESSION['atualSenha']);
        $_SESSION['mensagem'] = "3";
        header('location: mensagem.php');
    } else {
        header('location: HomeAdminValAtualizar.php');
    }
} else {
    header('location: HomeAdminValAtualizar.php');
}
?>