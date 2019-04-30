<!DOCTYPE html>
<html>
    <head>
        <?php
        include('../../util/util.php');
        include('../../util/corpo.php');
        cabecalho();
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <body>
        <div class="container alinh3">
            <div style="height:50px;"></div>
            <div class="well" style="margin-left:auto; margin-right:auto; padding:auto; width:70%;">
                <span style="font-size:25px; color:blue"><strong>Cadastro de Setor</strong></span>	
                <span class="pull-right"><a id="add" style="cursor:pointer;" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Adicionar</a></span>
                <div style="height:15px;"></div>
                <div id="table"></div>
                <div id="alert" class="alert alert-success" style="display:none;">
                    <center><span id="alerttext"></span></center>
                </div>
            </div>
            <?php include('modal.php'); ?>
            <script src="js/script.js"></script>
        </div>
        <?php
        rodape();
        ?>
</html>