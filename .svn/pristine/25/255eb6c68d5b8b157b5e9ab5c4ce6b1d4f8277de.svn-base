<?php
include_once '../util/conexaoBD.php';
include_once '../util/corpo.php';
cabecalho();
$con = conectarBD();
mysqli_query($con, "set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';");
mysqli_query($con, "set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';");
$query = "SELECT
CONCAT(UPPER(SUBSTRING(MONTHNAME(t.dataNascimento), 1, 1)),
SUBSTRING(MONTHNAME(t.dataNascimento), 2)) as MES,
COUNT(*) AS QtdAniversariantes
FROM tb_pessoa t WHERE NOT Excluido
GROUP BY MONTHNAME(t.dataNascimento)
ORDER BY MONTHNAME(t.dataNascimento);";
mysqli_query($con, "SET lc_time_names = 'pt_BR';");
salvarLog('S', 'tb_pessoa', '', 'Gerado relatório gráfico anual.');
$dados = mysqli_query($con, $query);
?>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
    google.charts.load('current', {packages: ['corechart'], 'language': 'pt'});
</script>
<div id = "container" style = "width: 80%; height: 600px; margin: 0 auto"></div>

<script language = "JavaScript" charset="utf-8">

    function drawChart() {
        // Define the chart to be drawn.
        var data = google.visualization.arrayToDataTable([
            ['Mês', 'Total do mês'],

<?php
while ($linha = mysqli_fetch_array($dados)) {
    echo "['" . (substr($linha["MES"], 0, 3) == "Mar" ? "Março" : $linha["MES"]) . "', " . $linha["QtdAniversariantes"] . "],";
}
?>

        ]);

        var options = {title: 'Gráfico por Mês (total)'};

        // Instantiate and draw the chart.
        var chart = new google.visualization.BarChart(document.getElementById('container'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart);
</script>
<?php
rodape();
?>