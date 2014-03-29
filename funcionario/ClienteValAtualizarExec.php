<?php

require '../banco/Banco.php';

$banco = new banco();
session_start();

if (( isset($_SESSION['login']) == FALSE) || ( isset($_SESSION['senha']) == FALSE)) {
    header('location: ../util/desconectado.php');
}

$nome = $_POST['nome'];
$contato = $_POST['contato'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = (int) $_POST['numero'];
$clienteCadastrado = "f";
$_SESSION['erro'] = "";
$tabela = "cliente";
$pesquisa = "*";

$resultado = $banco->pesquisar($pesquisa, $tabela);

if ($resultado == NULL) {
    echo "Problema na pesquisa.<br>";
} else {
    while ($registro = pg_fetch_array($resultado)) {
        if (($registro['rua'] === $rua) && ($registro['bairro'] === $bairro) && ($registro['numero'] === $numero)) {
            if (($registro['nome'] !== $_SESSION['atualNome']) && ($registro['contato'] !== $_SESSION['atualContato'])) {
                $clienteCadastrado = "t";
            }
        }
    }
}

if (($nome === "") || (strlen($nome) > 30)) {
    $_SESSION['erro'] = "1";
} else if (($contato === "") || (strlen($contato) < 8) || (strlen($contato) > 14)) {
    $_SESSION['erro'] = "2";
} else if (($rua === "") || (strlen($rua) > 50)) {
    $_SESSION['erro'] = "3";
} else if (($bairro === "") || (strlen($bairro) > 25)) {
    $_SESSION['erro'] = "4";
} else if (!$numero) {
    $_SESSION['erro'] = "5";
} else if ($clienteCadastrado === "t") {
    $_SESSION['erro'] = "6";
}

if ($_SESSION['erro'] === "") {

    $ruaAtual = $_SESSION['atualRua'];
    $bairroAtual = $_SESSION['atualBairro'];
    $numeroAtual = (int) $_SESSION['atualNumero'];
    $clausuraWere = "rua = '$ruaAtual' AND bairro = '$bairroAtual' AND numero = $numeroAtual";
    $chave = "rua = '$rua' AND bairro = '$bairro' AND numero = $numero";

    if ($chave !== $clausuraWere) {
        $clausuraSET = $chave;
        $resultado = $banco->update($tabela, $clausuraSET, $clausuraWere);
        if ($resultado == NULL)
            $_SESSION['erro'] = "30";
    }

    $clausuraWere = $chave;
    if ($nome !== $_SESSION['atualNome']) {
        $clausuraSET = "nome = '$nome' ";
        $resultado = $banco->update($tabela, $clausuraSET, $clausuraWere);
        if ($resultado == NULL)
            $_SESSION['erro'] = "31";
    }

    if ($contato !== $_SESSION['atualContato']) {
        $clausuraSET = "contato = '$contato' ";
        $resultado = $banco->update($tabela, $clausuraSET, $clausuraWere);
        if ($resultado == NULL)
            $_SESSION['erro'] = "32";
    }

    if ($_SESSION['erro'] === "") {
        unset($_SESSION['erro']);
        unset($_SESSION['atualNome']);
        unset($_SESSION['atualContato']);
        unset($_SESSION['atualRua']);
        unset($_SESSION['atualBairro']);
        unset($_SESSION['atualNumero']);
        $_SESSION['mensagem'] = "3";
        header('location: mensagem.php');
    } else {
        header('location: ClienteValAtualizar.php');
    }
} else {
    header('location: ClienteValAtualizar.php');
}
?>
