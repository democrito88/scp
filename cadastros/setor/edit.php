<?php

include('conn.php');
if (isset($_POST['eNome'])) {
    $nome = $_POST['eNome'];
    $id = $_POST['memid'];
    $conn->query("update tb_setor set Descricao='$nome' where id='$id'");
    salvarLog('U', 'tb_setor', $id, '');
}
?>