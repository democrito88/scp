<?php
include_once '../util/corpo.php';
include_once '../util/util.php';
include_once '../util/antiInjecao.php';
include '../util/conexaoBD.php';

$ID = retirarInjecao(issetGetOuPostComRetorno('id'));
$editar = (!is_null($ID) && !empty($ID) && $ID != '0');
if ($editar) {
    $QueryPessoa = "SELECT * FROM tb_pessoa WHERE ID = $ID";
    $QueryEndereco = "SELECT * FROM tb_endereco WHERE CodPessoa = $ID";
    $QueryTelefone = "SELECT * FROM tb_telefone WHERE CodPessoa = $ID";
    $QueryEmail = "SELECT * FROM tb_email WHERE CodPessoa = $ID";

    $dadosPessoa = mysqli_query(conectarBD(), $QueryPessoa);
    $dadosEndereco = mysqli_query(conectarBD(), $QueryEndereco);
    $dadosTelefone = mysqli_query(conectarBD(), $QueryTelefone);
    $dadosEmail = mysqli_query(conectarBD(), $QueryEmail);

    $linhaPessoa = mysqli_fetch_assoc($dadosPessoa);
    $linhaEndereco = mysqli_fetch_assoc($dadosEndereco);
    $linhaTelefone = mysqli_fetch_assoc($dadosTelefone);
    $linhaEmail = mysqli_fetch_assoc($dadosEmail);
}

cabecalho();
?>
<div id="divAlerta" class="divAlerta"></div>
<section>
    <form class="form-horizontal col-md-12" action="salvar.php" method="post">
        <fieldset>
            <div class="panel panel-primary">
                <div class="panel-heading">Cadastro de Pessoa</div>
                <div class="form-group">                   
                    <input type="hidden" id="ID" name="ID" value="<?= $editar ? $linhaPessoa['ID'] : '0' ?>">
                    <input type="hidden" id="IDEmail" name="IDEmail" value="<?= $editar ? $linhaEmail['ID'] : '0' ?>">
                    <input type="hidden" id="IDEndereco" name="IDEndereco" value="<?= $editar ? $linhaEndereco['ID'] : '0' ?>">
                    <input type="hidden" id="IDTelefone" name="IDTelefone" value="<?= $editar ? $linhaTelefone['ID'] : '0' ?>">
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2 control-label">
                            <p class="help-block">
                            <h11>* <b>Campo Obrigatório</b> </h11>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            CPF 
                            <h11>*</h11>
                        </label>
                        <div class="col-md-2">
                            <input onblur="verificarSeJaTemCPFCadastrado(); TestaCPF(this);" onkeypress="mascara(this)"  value="<?= $editar ? substr_replace(substr_replace(substr_replace($linhaPessoa['CPF'], '-', 9, 0), '.', 6, 0), '.', 3, 0) : ''; ?>" name="CPF" class="form-control input-md" id="CPF"  <?= $editar ? ' readonly="" ' : ' '; ?> required="" type="text" maxlength="14" pattern="[\d.-]{14}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            Nome 
                            <h11>*</h11>
                        </label>
                        <div class="col-md-5">
                            <input id="Nome" required="" value="<?= $editar ? $linhaPessoa['Nome'] : ''; ?>"name="Nome" placeholder="" class="form-control input-md"  type="text" onblur="paraMaiusculo(this);">
                        </div>
                        <label class="col-md-1 control-label">
                            Apelido
                        </label>
                        <div class="col-md-2">
                            <input id="Apelido" value="<?= $editar ? $linhaPessoa['Apelido'] : ''; ?>"name="Apelido" placeholder="" class="form-control input-md"  type="text" onblur="paraMaiusculo(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            Nome Do Pai
                        </label>
                        <div class="col-md-8">
                            <input id="NomeDoPai" value="<?= $editar ? $linhaPessoa['NomeDoPai'] : ''; ?>"name="NomeDoPai" placeholder="" class="form-control input-md"  type="text" onblur="paraMaiusculo(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            Nome Da Mãe
                        </label>
                        <div class="col-md-8">
                            <input id="NomeDaMae" value="<?= $editar ? $linhaPessoa['NomeDaMae'] : ''; ?>"name="NomeDaMae" placeholder="" class="form-control input-md"  type="text" onblur="paraMaiusculo(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            Nascimento
                            <h11>*</h11>
                        </label>
                        <div class="col-md-2">
                            <input type="date" value="<?= $editar ? $linhaPessoa['DataNascimento'] : ''; ?>"name="DataNascimento" id="dataNascimento" placeholder="DD/MM/AAAA" class="form-control input-md" required=""  OnKeyPress="formatar('##/##/####', this)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">
                            RG
                        </label>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="RG" value="<?= $editar ? $linhaPessoa['RG'] : ''; ?>"name="RG" placeholder="Apenas números" class="form-control input-md"  type="text" >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon">Orgão Emissor</span>
                                    <select class="form-control-static" id="OrgaoEmissorRG" name="OrgaoEmissorRG" >
                                        <?php
                                        $opcoesOrgaoEmissor = array("", "SDS", "SSP", "Outros");
                                        $i = 0;
                                        foreach ($opcoesOrgaoEmissor as $key => $value) {
                                            if ($editar && strcasecmp($linhaPessoa['OrgaoEmissorRG'], $value) == 0) {
                                                echo('<option selected value=' . $value . '>' . $value . '</option>');
                                            } else {
                                                echo('<option value=' . $value . '>' . $value . '</option>');
                                            }
                                            $i++;
                                        }
                                        ?>
<!--                                        <option value="<?= $editar ? $linhaPessoa['OrgaoEmissorRG'] : ''; ?>"></option>
                                        <option value="<?= $editar ? $linhaPessoa['OrgaoEmissorRG'] : ''; ?>">SDS</option>
                                        <option value="<?= $editar ? $linhaPessoa['OrgaoEmissorRG'] : ''; ?>">SSP</option>
                                        <option value="<?= $editar ? $linhaPessoa['OrgaoEmissorRG'] : ''; ?>">Outros</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon" name="" >Estado Emissor</span>
                                    <select id="UFEmissorRG"  class="form-control-static" name="UFEmissorRG">
                                        <script language="JavaScript" type="text/javascript" charset="utf-8">
                                            new dgCidadesEstados({
                                                estado: document.getElementById('UFEmissorRG')
                                            })
                                        </script>

                                        <script language="JavaScript" type="text/javascript" charset="utf-8">
                                            selecionarEstado(document.getElementById('UFEmissorRG'), '<?= $editar ? $linhaPessoa['UFEmissorRG'] : ''; ?>');
                                        </script>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">
                            Sexo
                            <!--<h11>*</h11>-->
                        </label>
                        <div class="radio col-md-10" id="sexo" name="dsexo">
                            <?php
                            $opcoesSexo = array("Não Informado", "Feminino", "Masculino");
                            $opcoesSexoValue = array("N", "F", "M");
                            $i = 0;
                            foreach ($opcoesSexo as $key => $value) {
                                if ($editar && strcasecmp($linhaPessoa['Sexo'], $opcoesSexoValue[$i]) == 0) {
                                    echo '<label><input type="radio" name="Sexo" id="Sexo" checked >' . $value . '</label><span>&nbsp&nbsp&nbsp</span>';
                                } else {
                                    echo '<label><input type="radio" ' . (!$editar && $i == 0 ? ' checked ' : '' ) . ' value=' . $opcoesSexoValue[$i] . ' name="Sexo" id="Sexo" >' . $value . '</label><span>&nbsp&nbsp&nbsp</span>';
                                }
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">
                            Estado Civil
                        </label>
                        <div class="col-md-1">
                            <div class="input-group">
                                <!--<span class="input-group-addon">Estado cívil</span>-->
                                <select id="EstadoCivil" class="form-control-static" name="EstadoCivil" >
                                    <?php
                                    $opcoesEstadoCivil = array("Não informado", "Solteiro(a)", "Casado(a)", "Divorciado(a)", "Viúvo(a)");
                                    $opcoesValue = array("N", "S", "C", "D", "V");
                                    $i = 0;
                                    foreach ($opcoesEstadoCivil as $key => $value) {
                                        if ($editar && strcasecmp($linhaPessoa['EstadoCivil'], $opcoesValue[$i]) == 0) {
                                            echo('<option name="EstadoCivil" selected value=' . $opcoesValue[$i] . '>' . $value . '</option>');
                                        } else {
                                            echo('<option name="EstadoCivil" ' . (!$editar && $i == 0 ? ' checked ' : '' ) . ' value=' . $opcoesValue[$i] . '>' . $value . '</option>');
                                        }
                                        $i++;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--</div>-->
                    <!--<div class="panel-body">-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">
                            Telefone 
                            <h11>*</h11>
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input type="text" value="<?= $editar ? '(' . $linhaTelefone['DDD'] . ') ' . substr_replace($linhaTelefone['Numero'], '-', strlen($linhaTelefone['Numero']) == 9 ? 5 : 4, 0) : ''; ?>"name="NumeroTelefone" id="NumeroTelefone" size="20"  maxlength="15" class="form-control" placeholder="(XX) XXXXX-XXXX"  required=""onkeypress="mascara(this)"> 
                                <span class="input-group-addon">Descrição</span>
                                <input type="text" value="<?= $editar ? $linhaTelefone['Descricao'] : ''; ?>" name="DescricaoTelefone" id="DescricaoTelefone" size="20" maxlength="20" value="Pessoal" class="form-control" onblur="paraMaiusculo(this);"> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">
                            Email 
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="Email" value="<?= $editar ? $linhaEmail['Email'] : ''; ?>"name="Email" class="form-control" type="email" placeholder="email@domimio.com.br"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" onblur="paraMinusculo(this);">
                                <span class="input-group-addon">Descrição</span>
                                <input id="DescricaoEmail" value="<?= $editar ? $linhaEmail['Descricao'] : ''; ?>"name="DescricaoEmail" class="form-control" type="text" value="Pessoal" onblur="paraMaiusculo(this);">
                            </div>
                        </div>
                    </div>
                    <hr >
                    <div class="form-group ">
                        <label class="col-md-2 control-label" for="prependedtext">
                            Naturalidade
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon">Estado</span>
                                <select id="NaturalidadeUF" class="form-control-static" name="NaturalidadeUF" >
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="input-group">
                                <span class="input-group-addon">Município</span>
                                <select id="NaturalidadeMunicipio" class="form-control-static" name="NaturalidadeMunicipio" >
                                    <script language="JavaScript" type="text/javascript" charset="utf-8">
                                        new dgCidadesEstados({
                                            cidade: document.getElementById('NaturalidadeMunicipio'),
                                            estado: document.getElementById('NaturalidadeUF')
                                        })
                                    </script>
                                    <script language="JavaScript" type="text/javascript" charset="utf-8">
                                        selecionarEstado(document.getElementById('NaturalidadeUF'), '<?= $editar ? $linhaPessoa['NaturalidadeUF'] : ''; ?>');
                                    </script>

                                    <script language="JavaScript" type="text/javascript" charset="utf-8">
                                        var cidade = {
                                            cidadeEncontrada: '<?= $linhaPessoa['NaturalidadeMunicipio'] ?>'
                                        };
                                        var select = document.getElementById('NaturalidadeMunicipio');
                                        for (index in cidade) {
                                            select.options[select.options.length] = new Option(cidade[index], cidade[index]);
                                        }
                                    </script>
                                </select>
                            </div>
                        </div>

                    </div>
                    <hr width="100%" />
                    <div class="form-group">
                        <label class="col-md-2 control-label">
                            CEP 
                            <h11>*</h11>
                        </label>
                        <div class="col-md-2">
                            <input id="CEP" value="<?php
                            echo $editar ? substr_replace($linhaEndereco['CEP'], '-', 5, 0) : '';
                            ?>"name="CEP" onkeypress="mascara(this);" onkeyup="pesquisacep(this);" placeholder="Apenas números" class="form-control input-md" required="" value="" type="text" maxlength="9" pattern="[0-9\-]+$">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" id="botaoPesquisarCEP" onclick="pesquisacep(document.getElementById('CEP'))">Pesquisar</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">
                            Endereço
                            <h11>*</h11>
                        </label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon">Estado</span>
                                <select id="Estado" class="form-control-static" name="UF">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    Cidade
                                    <h11>*</h11>
                                </span>
                                <select name="Municipio" id="Cidade" class="form-control-static">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    Bairro
                                    <h11>*</h11>
                                </span>
                                <input id="Bairro"  value="<?php
                                echo $editar ? $linhaEndereco['Bairro'] : '';
                                ?>"name="Bairro" class="form-control" placeholder="" required=""  type="text" onblur="paraMaiusculo(this);">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">
                        </label>
                        <div class="col-md">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        Endereço
                                        <h11>*</h11>
                                    </span>
                                    <input id="Endereco"  value="<?php
                                    echo $editar ? $linhaEndereco['Endereco'] : '';
                                    ?>"name="Endereco" class="form-control" placeholder="" required=""  type="text" onblur="paraMaiusculo(this);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        N.º
                                        <h11>*</h11>
                                    </span>
                                    <input id="Numero"  value="<?= $editar ? $linhaEndereco['Numero'] : ''; ?>"name="Numero" class="form-control" placeholder="" required=""  type="text">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        Complemento
                                    </span>
                                    <!--<select id="cidade"  class="form-control-static" name="cidade"></select-->
                                    <input id="Complemento"  value="<?= $editar ? $linhaEndereco['Complemento'] : ''; ?>"name="Complemento" class="form-control" placeholder=""    type="text" accesskey="" onblur="paraMaiusculo(this);"> 
                                </div>
                            </div>
                        </div>
                        <label class="col-md-2 control-label" for="prependedtext">
                            Tipo de residência 
                            <!--<h11>*</h11>-->
                        </label>
                        <div class="radio col-md-10" id="tipoDeResidencia" name="tipoDeResidencia">
                            <?php
                            $tiposDeResidencia = array("Não Informado", "Própria", "Alugada");
                            $opcoesRes = array("N", "P", "A");
                            $i = 0;
                            foreach ($tiposDeResidencia as $key => $value) {
                                if ($editar && strcasecmp($linhaEndereco['TipoDeResidencia'], $opcoesRes[$i]) == 0) {
                                    echo '<label><input type="radio" name="TipoDeResidencia" checked value=' . $opcoesRes[$i] . ' id="TipoDeResidencia" >' . $value . '</label><span>&nbsp&nbsp&nbsp</span>';
                                } else {
                                    echo '<label><input ' . (!$editar && $i == 0 ? ' checked ' : '' ) . ' type="radio" name="TipoDeResidencia" value=' . $opcoesRes[$i] . ' id="TipoDeResidencia" >' . $value . '</label><span>&nbsp&nbsp&nbsp</span>';
                                }
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                </div><br>
                <div class="form-group">
                    <label class="col-md-5 control-label" for="Cadastrar"></label>
                    <div class="col-md">
                        <button id="Cadastrar" name="Cadastrar" class="btn-lg <?= $editar ? 'btn-primary' : 'btn-success' ?>"  type="Submit" ><?= $editar ? '&nbsp;&nbsp;&nbsp;Editar&nbsp;&nbsp;&nbsp;' : 'Cadastrar'; ?></button>
                        <button id="Cancelar" name="Cancelar" onclick=" requestFocus(document.getElementById('CPF'));"class="btn-lg btn-danger" type="Reset">&nbsp&nbspLimpar&nbsp&nbsp</button>
                    </div>
                </div>
                <script language="JavaScript" type="text/javascript" charset="utf-8">
                    new dgCidadesEstados({
                        cidade: document.getElementById('Cidade'),
                        estado: document.getElementById('Estado')
                    })
                </script>
                <script language="JavaScript" type="text/javascript" charset="utf-8">
                    selecionarEstado(document.getElementById('Estado'), '<?= $editar ? $linhaEndereco['UF'] : ''; ?>');
                </script>

                <script language="JavaScript" type="text/javascript" charset="utf-8">
                    var cidade = {
                        cidadeEncontrada: '<?= $editar ? $linhaEndereco['Municipio'] : '' ?>'
                    };
                    var select = document.getElementById('Cidade');
                    for (index in cidade) {
                        select.options[select.options.length] = new Option(cidade[index], cidade[index]);
                    }
                </script>
            </div>
        </fieldset>
    </form>
</section>
<?php
rodape();
