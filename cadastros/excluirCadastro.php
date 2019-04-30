<?php

include_once '../util/corpo.php';
include_once '../util/antiInjecao.php';
include_once '../util/conexaoBD.php';
include_once '../util/util.php';
include_once '../util/testarSessao.php';

session_start();
testarSessao();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = retirarInjecao(issetGetOuPostComRetorno('id'));

    $queryExcluiPessoa = "UPDATE `tb_pessoa` SET `Excluido`= 1 WHERE `ID` = " . $id;

    $conexao = conectarBD();
    $feedbackExcluiPessoa = mysqli_query($conexao, $queryExcluiPessoa);
    desconectarBD($conexao);

    if (is_bool($feedbackExcluiPessoa) && !$feedbackExcluiPessoa) {
        throw new Exception("Não foi possível persistir no banco de dados.");
    } else {
//        cabecalho();
        /*echo '<script>window.alert("Usuário excluído com sucesso");'
        . 'window.location.href = "' . getURLPadrao() . '"'
        . '</script>';*/
        header("refresh:5;url=../principal.php?alerta=3");
//        rodape();
    }
}