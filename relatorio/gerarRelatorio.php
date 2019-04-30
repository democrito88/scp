<?php
include_once '../util/antiInjecao.php';
include_once '../util/corpo.php';
include_once '../util/conexaoBD.php';
include_once '../util/util.php';
cabecalho();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $complementoQuery = "";

    isset($_POST['nome']) && $_POST['nome'] != "" ? $complementoQuery .= " AND p.Nome LIKE '%" . retirarInjecao($_POST['nome']) . "%' " : $complementoQuery .= "";
    isset($_POST['dataNascimentoInicial']) && $_POST['dataNascimentoInicial'] != "" ? $complementoQuery .= " AND MONTH(p.DataNascimento) BETWEEN  MONTH('" . retirarInjecao($_POST['dataNascimentoInicial']) . "') " : $complementoQuery .= "";
    isset($_POST['dataNascimentoFinal']) && $_POST['dataNascimentoFinal'] != "" ? $complementoQuery .= " AND MONTH('" . retirarInjecao($_POST['dataNascimentoFinal']) . "') " : $complementoQuery .= "";
    isset($_POST['UF']) && $_POST['UF'] != "" ? $complementoQuery .= " AND e.UF = '" . retirarInjecao($_POST['UF']) . "' " : $complementoQuery .= "";
    isset($_POST['municipio']) && $_POST['municipio'] != "" ? $complementoQuery .= "AND e.Municipio LIKE '%" . retirarInjecao($_POST['municipio']) . "%' " : $complementoQuery .= "";
    isset($_POST['cpf']) && $_POST['cpf'] != "" ? $complementoQuery .= " AND p.CPF = '" . limparString(retirarInjecao($_POST['cpf'])) . "' " : $complementoQuery .= "";
    isset($_POST['rg']) && $_POST['rg'] != "" ? $complementoQuery .= " AND p.RG = '" . limparString(retirarInjecao($_POST['rg'])) . "' " : $complementoQuery .= "";
    isset($_POST['cep']) && $_POST['cep'] != "" ? $complementoQuery .= " AND e.CEP = '" . limparString(retirarInjecao($_POST['cep'])) . "' " : $complementoQuery .= "";
    isset($_POST['Bairro']) && $_POST['Bairro'] != "" ? $complementoQuery .= " AND e.Bairro LIKE '%" . retirarInjecao($_POST['Bairro']) . "%' " : $complementoQuery .= "";

    $complementoQuery .= " AND NOT p.excluido;";

    $queryBuscaPessoa = "SELECT p.ID Codigo,
p.Nome,
DATE_FORMAT(p.DataNascimento, '%d/%m/%Y') AS DataNascimento,
INSERT( INSERT( INSERT( p.CPF, 10, 0, '-' ), 7, 0, '.' ), 4, 0, '.' ) AS CPF,
p.RG,
e.Pais,
INSERT( e.CEP, 6, 0, '-' ) AS CEP,
e.UF,
e.Municipio,
e.Bairro,
e.Endereco,
e.Numero,
e.Complemento, 
t.ddd,    
t.Numero,     
t.Descricao,  
concat('(', DDD, ') ', t.Numero) TelefoneFormatado,
concat(Endereco, ', n.º ', e.Numero, ' B.: ', e.Bairro, ', ', e.Municipio, '-', e.UF, ' - ', e.CEP) EnderecoCompleto
FROM tb_pessoa p
LEFT JOIN tb_endereco e ON p.id = e.codpessoa
LEFT JOIN tb_telefone t ON p.id = t.codpessoa
WHERE TRUE
" . $complementoQuery;

    $conexao = conectarBD();
    $resultados = mysqli_query($conexao, $queryBuscaPessoa);
    desconectarBD($conexao);
    $nResultados = mysqli_num_rows($resultados);
    salvarLog('S', 'tb_pessoa', '', '');
}

$privilegio = parse_ini_string($_SESSION['Privilegio']);
?>
<div id="modalImpressao"></div>
<div class="barra"></div>
<section  class="alinh2">
    <h2 style="color: #666;">Busca de Cadastros</h2>
    <h4>A consulta retornou <?php echo $nResultados; ?> resultados</h4>
    <button class="btn btn-primary" onclick="window.location.replace('formularioRelatorio.php')">Voltar</button><br><br>
    <table class="table table-responsive table-hover ">
        <thead><tr><th>Nome</th><th>CPF</th><th>RG</th><th>CEP</th><th>Cidade</th><th>Estado</th><th>Data de Nascimento</th><th>Telefone</th><th>Bairro</th>
                <?php echo ($privilegio['CadastraPessoa'] == 1 ? '<th>Editar</th><th>Remover</th></tr></thead>' : '');
                ?>
        <tbody>
            <?php
            if (!is_bool($resultados)) {
                $listaIDs = array();
                while ($resultado = mysqli_fetch_assoc($resultados)) {
                    array_push($listaIDs, $resultado['Codigo']);
                    echo "<tr><td>" . $resultado['Nome'] . "</td>" .
                    "<td>" . $resultado['CPF'] . "</td>" .
                    "<td>" . $resultado['RG'] . "</td>" .
                    "<td>" . $resultado['CEP'] . "</td>" .
                    "<td>" . $resultado['Municipio'] . "</td>" .
                    "<td>" . $resultado['UF'] . "</td>" .
                    "<td>" . $resultado['DataNascimento'] . "</td>" .
                    "<td>" . $resultado['TelefoneFormatado'] . "</td>" .
                    "<td>" . $resultado['Bairro'] . "</td>" .
                    ($privilegio['CadastraPessoa'] == 1 ?
                            "<td><button class='btn btn-warning' onclick='window.location.replace(\"../cadastros/formularioCadastro.php?id=" . $resultado['Codigo'] . "\");'><i class='glyphicon glyphicon-pencil'></i>&nbsp;Editar</button></td>" .
                            "<td><button class='btn btn-danger' onclick='window.location.replace(\"../cadastros/excluirCadastro.php?id=" . $resultado['Codigo'] . "\");'><i class='glyphicon glyphicon-trash'></i>&nbsp;Remover</button></td>" : "") .
                    "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <?php
    if (1 == $privilegio['GeraEtiqueta']) {
        echo '
    <form>
        <input type="text" name="ids[]" value="';
        foreach ($listaIDs as $id) {
            echo $id . ", ";
        }
        echo " 0";
        echo '" style="display: none;">';
        echo '';
        echo '<button class="btn-danger tooltip" type="button" onclick="mostrarModalImpressao();"' ;
        echo $nResultados == 0 ? "disabled" : "";
        echo '>
            <span class="icon icon-file-pdf"></span>&nbsp;Imprimir';
        echo $nResultados == 0 ? "<span class='tooltiptext'>Sem dados para gerar etiquetas!</span>" : "";
        echo '</button><br><br>
    </form>';
    }
    ?>
</section>
<?php
rodape();


