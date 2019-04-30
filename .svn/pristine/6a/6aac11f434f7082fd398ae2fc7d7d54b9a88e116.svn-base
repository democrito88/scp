<?php
include_once '../../util/antiInjecao.php';
include('conn.php');
if (isset($_POST['Nome'])) {
    $nome = retirarInjecao($_POST['Nome']);
    $username = retirarInjecao($_POST['Username']);
    $senha = retirarInjecao($_POST['Senha']);
    $setorId = retirarInjecao($_POST['Setor']);
    $privilegioId = retirarInjecao($_POST['Privilegio']);
    $conn->query("insert into tb_usuario (CodSetor, CodPrivilegio, Nome, NomeUsuario, Senha) values ('$setorId', '$privilegioId', '$nome', '$username', md5(md5('$senha')))");
    $ultimo_valor_inserido = mysqli_insert_id($conn);
    salvarLog('I', 'tb_usuario', $ultimo_valor_inserido, '');
}
?>