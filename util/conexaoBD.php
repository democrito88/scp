<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/scp/util/util.php');

function conectarBD() {
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $baseDeDados = "scp";
    return mysqli_connect($host, $usuario, $senha, $baseDeDados);
}

function desconectarBD($conexao) {
    return mysqli_close($conexao);
}

function salvarLog($parametro, $tabela, $idNaTabelaDestino, $observacao) {
    //U - Update | D - Deletou (excluiu) | I - Inseriu | L - Logou | Q - Quit (Saiu do sistema) | S - Consultou (Select) | G - Gerou PDF
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    $ip = getIpDoCliente();
    $query = "INSERT INTO tb_log SET CodUsuario = " . $_SESSION['IDUsuario'] . ","
            . " DataHora = now(),"
            . " Parametro = '$parametro',"
            . " IP = '$ip',"
            . " Tabela = '$tabela',"
            . " IDNaTabela = '$idNaTabelaDestino',"
            . " Observacao = '$observacao';";
    if (conectarBD()->query($query) === true) {
        //SALVO
    }
}
