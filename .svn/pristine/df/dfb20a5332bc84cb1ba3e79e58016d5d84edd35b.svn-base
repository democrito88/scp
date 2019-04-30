<?php

include('conn.php');
if (isset($_POST['e_Descricao'])) {
    $descricao = $_POST['e_Descricao'];
    $editaConfiguracao = isset($_POST['e_EditaConfiguracao']);
    $cadastraPrivilegio = isset($_POST['e_CadastraPrivilegio']) ? 1 : 0;
    $cadastraPessoa = isset($_POST['e_CadastraPessoa']) ? 1 : 0;
    $cadastraSetor = isset($_POST['e_CadastraSetor']) ? 1 : 0;
    $cadastraUsuario = isset($_POST['e_CadastraUsuario']) ? 1 : 0;
    $geraEtiqueta = isset($_POST['e_GeraEtiqueta']) ? 1 : 0;
    $timeOut = $_POST['e_TimeOut'];
    $id = $_POST['memid'];
    $conn->query("UPDATE tb_privilegio
                    SET `Descricao` = '$descricao',
                        `EditaConfiguracao` = 0,
                        `CadastraPrivilegio` = $cadastraPrivilegio,
                        `CadastraPessoa` = $cadastraPessoa,
                        `CadastraSetor` = $cadastraSetor,
                        `CadastraUsuario` = $cadastraUsuario,
                        `GeraEtiqueta` = $geraEtiqueta,
                        `TimeOut` = $timeOut
                         WHERE ID = '$id'");
    salvarLog('U', 'tb_privilegio', $id, '');
}
?>