<?php

include '../util/antiInjecao.php';
include '../util/conexaoBD.php';

$CPF = retirarInjecao(limparString($_POST['CPF']));
$QueryPessoa = "SELECT * FROM tb_pessoa WHERE CPF like '$CPF'";
$dadosPessoa = mysqli_query(conectarBD(), $QueryPessoa);
if (mysqli_num_rows($dadosPessoa) > 0) {
    echo 1;
} else {
    echo 0;
}
?>