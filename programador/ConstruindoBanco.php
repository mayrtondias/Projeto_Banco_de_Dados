<?php

require '../banco/NewBanco.php';
require '../banco/Banco.php';

$banco = new NewBanco();

$selecionado = $_POST['selecionado'];

switch ((int) $selecionado) {
    case 1:
        $banco->criandoBanco();
        break;
    case 2:
        $banco->criandoTabelaAdministrador();
        break;
    case 3:
        $banco->criandoTabelaCliente();
        break;
    case 4:
        $banco->criandoTabelaFuncionario();
        break;
    case 5:
        $banco->criandoTabelaProduto();
        break;
    case 6:
        $banco->criandoTabelaVenda();
        break;
    case 7:
        $banco->criandoTabelaCompra();
        break;
    case 8:
        $banco->criandoTabelaFornecedor();
        break;
    case 9:
        $banco->criandoTabelaConta();
        break;
    case 10:
        $banco->apagarBanco();
        break;
    case 11:
        $banco->criandoIndicesAdministrador();
        break;
    case 12:
        $banco->criandoIndicesCliente();
        break;
    case 13:
        $banco->criandoIndicesCompra();
        break;
    case 14:
        $banco->criandoIndicesConta();
        break;
    case 15:
        $banco->criandoIndicesFornecedor();
        break;
    case 16:
        $banco->criandoIndicesFuncionario();
        break;
    case 17:
        $banco->criandoIndicesProduto();
        break;
    case 18:
        $banco->criandoIndicesVenda();
        break;
    case 19:
        $banco->apagarTabelaAdministrador();
        break;
    case 20:
        $banco->apagarTabelaCliente();
        break;
    case 21:
        $banco->apagarTabelaCompra();
        break;
    case 22:
        $banco->apagarTabelaConta();
        break;
    case 23:
        $banco->apagarTabelaFornecedor();
        break;
    case 24:
        $banco->apagarTabelaFuncionario();
        break;
    case 25:
        $banco->apagarTabelaProduto();
        break;
    case 26:
        $banco->apagarTabelaVenda();
        break;
    case 27:
        $banco = new Banco();
        $banco->inserirAdministrador("Administrador", "admin", "12345678");
        break;
    default:
        header('location:ProgramadorHome.php');
}
header('location:../util/Sucesso.php');
?>