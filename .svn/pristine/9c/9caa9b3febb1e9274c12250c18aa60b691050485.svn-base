<?php
include('conn.php');
if (isset($_POST['fetch'])) {
    ?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <th>Descrição</th>
        <!--<th>Edita configuração</th>-->
        <th>Cadastra privilégio</th>
        <th>Cadastra pessoa</th>
        <th>Cadastra setor</th>
        <th>Cadastra usuário</th>
        <th>Gera etiqueta</th>
        <th>Timeout</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php
        $query = $conn->query("select * from tb_privilegio "
                . "where not excluido order by ID asc");
        salvarLog('S', 'tb_privilegio', '', '');
        while ($row = $query->fetch_array()) {
            ?>
            <tr>
                <td><span id="Descricao<?php echo $row['ID']; ?>"><?php echo $row['Descricao']; ?></span></td>
                <!--<td><span id="EditaConfiguracao<?php echo $row['ID']; ?>"><?php echo $row['EditaConfiguracao'] == 1 ? '<b><font color=green>Sim</font></b>' : '<b><font color=red>Não</font></b>'; ?></span></td>-->
                <td><span id="CadastraPrivilegio<?php echo $row['ID']; ?>"><?php echo $row['CadastraPrivilegio'] == 1 ? '<b><font color=green>Sim</font></b>' : '<b><font color=red>Não</font></b>'; ?></span></td>
                <td><span id="CadastraPessoa<?php echo $row['ID']; ?>"><?php echo $row['CadastraPessoa'] == 1 ? '<b><font color=green><b><font color=green>Sim</font></b></font></b>' : '<b><font color=red>Não</font></b>'; ?></span></td>
                <td><span id="CadastraSetor<?php echo $row['ID']; ?>"><?php echo $row['CadastraSetor'] == 1 ? '<b><font color=green>Sim</font></b>' : '<b><font color=red>Não</font></b>'; ?></span></td>
                <td><span id="CadastraUsuario<?php echo $row['ID']; ?>"><?php echo $row['CadastraUsuario'] == 1 ? '<b><font color=green>Sim</font></b>' : '<b><font color=red>Não</font></b>'; ?></span></td>
                <td><span id="GeraEtiqueta<?php echo $row['ID']; ?>"><?php echo $row['GeraEtiqueta'] == 1 ? '<b><font color=green>Sim</font></b>' : '<b><font color=red>Não</font></b>'; ?></span></td>
                <td><span id="TimeOut<?php echo $row['ID']; ?>"><?php echo $row['TimeOut']; ?></span></td>
                <td>
                    <a style="cursor:pointer;" class="btn btn-warning edit" data-id="<?php echo $row['ID']; ?>"><span class="glyphicon glyphicon-edit"></span> Editar</a> 
                    <a style="cursor:pointer;" class="btn btn-danger delete" data-id="<?php echo $row['ID']; ?>"><span class="glyphicon glyphicon-trash"></span> Apagar</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
    </table>
    <?php
}
?>


