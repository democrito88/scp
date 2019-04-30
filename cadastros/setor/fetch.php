<?php
include('conn.php');
if (isset($_POST['fetch'])) {
    ?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <th>Nome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php
        $query = $conn->query("select * from tb_setor "
                . "where not excluido order by ID asc");
        salvarLog('S', 'tb_setor', '', '');
        while ($row = $query->fetch_array()) {
            ?>
            <tr>
                <td><span id="Nome<?php echo $row['ID']; ?>"><?php echo $row['Descricao']; ?></span></td>
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


