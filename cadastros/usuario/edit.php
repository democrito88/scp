<?php

include('conn.php');
include '../../util/antiInjecao.php';
if (isset($_POST['eNome'])) {
    $nome = retirarInjecao($_POST['eNome']);
    $username = retirarInjecao($_POST['eUsername']);
    $senha = retirarInjecao($_POST['eSenha']);
    $setorId = retirarInjecao($_POST['eSetor']);
    $privilegioId = retirarInjecao($_POST['ePrivilegio']);
    $id = retirarInjecao($_POST['memid']);
    $conn->query("UPDATE tb_usuario SET CodSetor=$setorId, CodPrivilegio = $privilegioId, Nome='$nome', NomeUsuario='$username', Senha=MD5(MD5('$senha')) WHERE ID=$id");
    salvarLog('U', 'tb_usuario', $id, '');
}
?>