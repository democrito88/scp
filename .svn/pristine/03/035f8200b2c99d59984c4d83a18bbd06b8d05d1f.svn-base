<?php

include('conn.php');
if (isset($_POST['Descricao'])) {
    $descricao = $_POST['Descricao'];
//    $editaConfiguracao = isset($_POST['EditaConfiguracao']);
    $cadastraPrivilegio = isset($_POST['CadastraPrivilegio']) ? 1 : 0;
    $cadastraPessoa = isset($_POST['CadastraPessoa']) ? 1 : 0;
    $cadastraSetor = isset($_POST['CadastraSetor']) ? 1 : 0;
    $cadastraUsuario = isset($_POST['CadastraUsuario']) ? 1 : 0;
    $geraEtiqueta = isset($_POST['GeraEtiqueta']) ? 1 : 0;
    $timeOut = $_POST['TimeOut'];
    $conn->query("INSERT INTO tb_privilegio
                    SET `Descricao` = '$descricao',
                    `EditaConfiguracao` = 0,
                    `CadastraPrivilegio` = $cadastraPrivilegio,
                    `CadastraPessoa` = $cadastraPessoa,
                    `CadastraSetor` = $cadastraSetor,
                    `CadastraUsuario` = $cadastraUsuario,
                    `GeraEtiqueta` = $geraEtiqueta,
                    `TimeOut` = $timeOut");
    $ultimo_valor_inserido = mysqli_insert_id($conn);
    salvarLog('I', 'tb_privilegio', $ultimo_valor_inserido, '');
}
?>