<?php

include_once '../util/util.php';
include_once '../util/conexaoBD.php';
include_once '../util/antiInjecao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    date_default_timezone_set('America/Recife');
    $login = retirarInjecao($_POST['login']);
    $senha = retirarInjecao($_POST['senha']);

    $queryBuscaLogin = "SELECT u.ID, Nome, "
            . " p.ID IDPrivilegio, Descricao, EditaConfiguracao, CadastraPrivilegio, CadastraPessoa, CadastraSetor, CadastraUsuario, GeraEtiqueta, TimeOut "
            . " FROM `tb_usuario` u "
            . " INNER JOIN tb_privilegio p on p.ID = u.CodPrivilegio "
            . " WHERE NomeUsuario = '" . $login . "' AND Senha = MD5(MD5('" . $senha . "'))";
    $conexao = conectarBD();
    $sessoes = mysqli_query($conexao, $queryBuscaLogin);
    desconectarBD($conexao);
//if (isset($_SESSION['IDUsuario']) && isset($_SESSION['NomeUsuario']) && isset($_SESSION['DataHora']) && $diferencaEmHoras > 1) {

    if (!is_bool($sessoes) && mysqli_num_rows($sessoes) == 1) {
        while ($sessao = mysqli_fetch_assoc($sessoes)) {
            $_SESSION['NomeUsuario'] = $sessao['Nome'];
            $_SESSION['IDUsuario'] = $sessao['ID'];
            $_SESSION['DataHora'] = date('Y/m/d H:i:s');
            $_SESSION['Privilegio'] = "ID = " . $sessao['IDPrivilegio'] . "
                                        Descricao=\"" . $sessao['Descricao'] . "\"
                                        EditaConfiguracao=" . $sessao['EditaConfiguracao'] . "
                                        CadastraPrivilegio=" . $sessao['CadastraPrivilegio'] . "
                                        CadastraPessoa=" . $sessao['CadastraPessoa'] . "
                                        CadastraSetor=" . $sessao['CadastraSetor'] . "
                                        CadastraUsuario=" . $sessao['CadastraUsuario'] . "
                                        GeraEtiqueta=" . $sessao['GeraEtiqueta'] . "
                                        TimeOut=" . $sessao['TimeOut'];
        }
        salvarLog('L', '', $_SESSION['IDUsuario'], '');
        header('Location: ' . getURLPadrao() . '/principal.php');
    } else {
        header('Location: ' . getURLPadrao() . '/login.php?alerta=10');
    }
}
