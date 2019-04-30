<?php

include('conn.php');
if (isset($_POST['memid'])) {
    $idDoSetor = $_POST['memid'];
    $conn->query("update tb_setor set excluido = true where ID='$idDoSetor'");
    salvarLog('D', 'tb_setor', $idDoSetor, '');
}
?>