<?php

function testarSessao() {
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
    $uri .= $_SERVER['HTTP_HOST'];
    date_default_timezone_set('America/Recife');
    $dataHoraAtual = new DateTime(date('Y/m/d H:i:s'));
    $dataHoraSessao = new DateTime($_SESSION['DataHora']);
    $qtdDeMinimaDeMinutosParaDeslogarUsuario = 30;
    $diff = $dataHoraAtual->diff($dataHoraSessao);
    $qtdDeMinutosDiferencaDaHoraAtualParaDaSessao = $diff->h + ($diff->days * 24) + ($diff->m);
    //DEBBUG
    if (isset($_SESSION['IDUsuario']) && isset($_SESSION['NomeUsuario']) && isset($_SESSION['DataHora']) && $qtdDeMinutosDiferencaDaHoraAtualParaDaSessao < $qtdDeMinimaDeMinutosParaDeslogarUsuario) {
        //Se a pessoa está mexendo, atualiza a datahora sessão
        $debugarSessao = false;
        if ($debugarSessao) {
            echo '<font color=red>DEBBUG Session time:<br>'
            . 'Usuário: ' . $_SESSION['NomeUsuario'] . " [" . $_SESSION['IDUsuario'] . "]" . "<br>"
            . "Data e Hora da sessão: " . $_SESSION['DataHora'] . "<br>"
            . "DataHoraAtual: " . date('Y/m/d H:i:s') . "<br>"
            . "Diferença em minutos: " . $qtdDeMinutosDiferencaDaHoraAtualParaDaSessao . "<br>"
            . "Tempo (minutos) para deslogar: " . $qtdDeMinimaDeMinutosParaDeslogarUsuario . ""
            . "</font><br><br>Privilégio do usuário da sessão:<br>".$_SESSION['Privilegio'];
        }
        $_SESSION['DataHora'] = date('Y/m/d H:i:s');
    } else {
        header("Location: $uri/scp/util/logout.php?alerta=xxx");
    }
}
