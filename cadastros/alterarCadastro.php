<?php

include_once '../util/conexaoBD.php';
include_once '../util/antiInjecao.php';
include_once '../util/util.php';
session_start();
testarSessao();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //TB_Pessoa
    $nome = retirarInjecao($_POST['nome']);
    $apelido = retirarInjecao($_POST['apelido']);
    $cpf = limparString(retirarInjecao($_POST['cpf']));
    $rg = limparString(retirarInjecao($_POST['rg']));
    $orgaoEmissorRG = retirarInjecao($_POST['orgaoEmissorRG']);
    $dataNascimento = retirarInjecao($_POST['dataNascimento']);
    $sexo = retirarInjecao($_POST['sexo']);
    $naturalidadeUF = retirarInjecao($_POST['naturalidadeUF']);
    $naturalidadeMunicipio = retirarInjecao($_POST['naturalidadeMunicipio']);
    $estadoCivil = retirarInjecao($_POST['estadoCivil']);
    $nomeDoPai = retirarInjecao($_POST['nomeDoPai']);
    $nomeDaMae = retirarInjecao($_POST['nomedaMae']);

    //TB_Telefone
    $tipo = retirarInjecao($_POST['tipo']);
    $numeroTelefone = limparString(retirarInjecao($_POST['numeroTelefone']));
    $ddd = retirarInjecao($_POST['ddd']);
    $ddi = retirarInjecao($_POST['ddi']);
    $descricaoTelefone = retirarInjecao($_POST['descricaoTelefone']);

    //TB_Email
    $email = retirarInjecao($_POST['email']);
    $descricaoEmail = retirarInjecao($_POST['descricaoEmail']);

    //TB_Endereco
    $cep = limparString(retirarInjecao($_POST['cep']));
    $pais = retirarInjecao($_POST['pais']);
    $uF = retirarInjecao($_POST['uF']);
    $municipio = retirarInjecao($_POST['municipio']);
    $bairro = retirarInjecao($_POST['bairro']);
    $endereco = retirarInjecao($_POST['endereco']);
    $numero = retirarInjecao($_POST['numero']);
    $complemento = retirarInjecao($_POST['complemento']);
    $tipoDeResidencia = retirarInjecao($_POST['tipoDeResidencia']);

    $queryInserePessoa = "INSERT INTO `TB_Pessoa`(`Nome`,`Apelido`,`CPF`,`RG`,`OrgaoEmissoRG`,`DataNascimento`,`Sexo`,`NaturalidadeUF`,`NaturalidadeMunicipio`,`EstadoCivil`,`NomeDoPai`,`NomeDaMae`) "
            . "VALUES('" . $nome . "', '" . $apelido . "', '" . $cpf . "', '" . $rg . "', '" . $orgaoEmissorRG . "', '" . $dataNascimento . "', '" . $sexo . "', '" . $naturalidadeUF . "', '" . $naturalidadeMunicipio . "', '" . $estadoCivil . "', '" . $nomeDoPai . "', '" . $nomeDaMae . "')"
            . "
        ON DUPLICATE KEY update
        `Nome` = NULL,
        `Apelido` = NULL,
        `CPF` = NULL,
        `RG` = NULL,
        `OrgaoEmissorRG` = NULL,
        `DataNascimento` = NULL,
        `Sexo` = NULL,
        `NaturalidadeUF` = NULL,
        `NaturalidadeMunicipio` = NULL,
        `EstadoCivil` = NULL,
        `NomeDoPai` = NULL,
        `NomeDaMae` = NULL,
        `Excluido` = NULL; ";

    $conexao = conectarBD();
    $feedbackInsercaoPessoa = mysqli_query($conexao, $queryInserePessoa);

    if (is_bool($feedbackInsercaoPessoa)) {
        throw new Exception("<p>N&atilde;o foi poss&iacute;vel inserir no banco de dados.</p>");
    } else {
        $id = mysqli_insert_id($conexao);

        $queryInsereTelefone = "INSERT INTO `TB_Telefone`(`CodUsuario`, `Tipo`, `NumeroTelefone`, `DDD`, `DDI`, `descricao`)"
                . " VALUES('" . $id . "', " . $tipo . "', '" . $numeroTelefone . "','" . $ddd . "', '" . $ddi . "', '" . $descricaoTelefone . "')"
                . "ON DUPLICATE KEY update"
                . "`CodUsuario` = NULL, "
                . "`Tipo` = NULL, "
                . "`NumeroTelefone` = NULL, "
                . "`DDD` = NULL, "
                . "`DDI` = NULL, "
                . "`descricao` = NULL; ";

        $queryInsereEmail = "INSERT INTO `TB_Email`(`CodUsuario`, `Email`, `Descricao`)"
                . " VALUES('" . $id . "', " . $email . "', '" . $descricaoEmail . "')"
                . " ON DUPLICATE KEY update "
                . "`CodUsuario` = NULL, "
                . "`Email` = NULL, "
                . "`Descricao` = NULL; ";

        $queryInsereEndereco = "INSERT INTO `TB_Endereco`(`CodUsuario`, `CEP`,`Pais`,`UF`,`Municipio`,`Bairro`,`Endereco`,`Numero`,`Complemento`,`TipoDeResidencia`)"
                . " VALUES('" . $id . "', " . $cep . "', '" . $pais . "', '" . $uF . "', '" . $municipio . "', '" . $bairro . "', '" . $endereco . "', '" . $numero . "', '" . $complemento . "', '" . $tipoDeResidencia . "')"
                . " ON DUPLICATE KEY update "
                . "`CodUsuario` = NULL, "
                . "`CEP` = NULL, "
                . "`Pais` = NULL, "
                . "`UF` = NULL, "
                . "`Municipio` = NULL, "
                . "`Bairro` = NULL, "
                . "`Endereco` = NULL, "
                . "`Numero` = NULL, "
                . "`Complemento` = NULL, "
                . "`TipoDeResidencia` = NULL; ";

        $feedbackInsercaoDemais = mysqli_query($conexao, $queryInsereTelefone . $queryInsereEmail . $queryInsereEndereco);

        if (is_bool($feedbackInsercaoPessoa)) {
            throw new Exception("<p>N&atilde;o foi poss&iacute;vel inserir no banco de dados.</p>");
        }
    }

    desconectarBD($conexao);

    header("Location: ../index.php");
}