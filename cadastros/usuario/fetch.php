<?php
include('conn.php');
if (isset($_POST['fetch'])) {
    ?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <th>Nome</th>
        <th>Username</th>
        <th>Setor</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php
        $query = $conn->query("select s.Descricao DescricaoSetor, s.ID IDSetor, p.ID IDPrivilegio, u.* from `tb_usuario` u "
                . "inner join tb_setor s on s.id = u.CodSetor "
                . "inner join tb_privilegio p on u.CodPrivilegio = p.id "
                . "where not u.excluido order by ID asc");
        salvarLog('S', 'tb_usuario', '', '');
        while ($row = $query->fetch_array()) {
            ?>
            <tr>
                <td>
                    <span id="Nome<?php echo $row['ID']; ?>"><?php echo $row['Nome']; ?></span>
                    <span style="visibility: hidden" id="idPrivilegio<?php echo $row['ID']; ?>"><?php echo $row['IDPrivilegio']; ?></span>
                </td>
                <td><span id="Username<?php echo $row['ID']; ?>"><?php echo $row['NomeUsuario']; ?></span></td>
                <td>
                    <span style="visibility: hidden" id="idSetor<?php echo $row['ID']; ?>"><?php echo $row['IDSetor']; ?></span>
                    <span id="Setor<?php echo $row['ID']; ?>"><?php echo $row['DescricaoSetor']; ?></span></td>
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


