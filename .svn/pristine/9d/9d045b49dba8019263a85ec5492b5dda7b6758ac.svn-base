<?php
echo '
<i class="glyphicon glyphicon-remove botao-fechar" onclick="fecharModal(\'modalImpressao\');"></i><br><br>
<div class="panel panel-info conteudo-modal">
    <div class="panel-heading">
        <h4>Modo de impressão</h4>
    </div>
    <div class="panel-body">
        <h5>Escolha a etiqueta a qual deve-se iniciar a impressão</h5><br>
        <form id="formPDF" action="../imprimir/geraPDF.php" method="POST">
            <input type="text" name="ids[]" value="'.$_GET['ids'].'" style="display: none;">
            <div class="papel-wrapper">
                <div class="papel">
                    <div class="coluna-esquerda">
                        <canvas id="0" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="2" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="4" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="6" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="8" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="10" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="12" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                    </div>
                    <div class="coluna-direita">
                        <canvas id="1" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="3" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="5" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="7" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="9" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="11" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                        <canvas id="13" onclick="completaEtiquetas(this.id); insereEtiquetaVazia(this.id);"></canvas>
                    </div>
                </div>
            </div><br><br>
            <input id="etiquetasVazias" type="text" name="etiquetasVazias" target="_blank" style="display: none;">
            <button class="btn btn-danger" type="submit">Feito</button>
        </form>
    </div>
</div>
';
?>