<?php

include('conn.php');
include_once '../../util/antiInjecao.php';

if (isset($_POST['memid'])) {
    $id = retirarInjecao($_POST['memid']);
    $conn->query("UPDATE tb_usuario SET excluido = true WHERE ID='$id'");
    salvarLog('D', 'tb_usuario', $id, '');
}
?>