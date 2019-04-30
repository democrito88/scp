<?php

include('conn.php');
if (isset($_POST['Nome'])) {
    $descricao = $_POST['Nome'];
    $conn->query("insert into tb_setor (Descricao) values ('$descricao')");
    $ultimo_valor_inserido = mysqli_insert_id($conn);
    salvarLog('I', 'tb_setor', $ultimo_valor_inserido, '');
}
?>