<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Adicionar novo usuário</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="addForm">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Nome:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="Nome" id="Nome">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Username:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="Username" id="Username">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Setor:</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" name="Setor">
                                    <?php
                                    include '../../util/conexaoBD.php';
                                    $query = "SELECT * FROM tb_setor WHERE not excluido";
                                    $dados = mysqli_query(conectarBD(), $query);
                                    while ($linha = mysqli_fetch_array($dados)) {
                                        echo '<option name="Setor" value="' . $linha['ID'] . '">' . $linha['Descricao'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Privilégio:</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" name="Privilegio" id="Privilegio">
                                    <?php
                                    $query = "SELECT * FROM tb_privilegio WHERE not excluido";
                                    $dados = mysqli_query(conectarBD(), $query);
                                    while ($linha = mysqli_fetch_array($dados)) {
                                        echo '<option name="Privilegio" value="' . $linha['ID'] . '">' . $linha['Descricao'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Senha:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="password" class="form-control" name="Senha" id="Senha">
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="button" id="addbutton" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
            </div>

        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editmem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar usuário</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="editForm">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Nome:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="eNome" id="eNome">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Username:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="eUsername" id="eUsername">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Setor:</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" name="eSetor">
                                    <?php
                                    $query = "SELECT * FROM tb_setor WHERE not excluido";
                                    $dados = mysqli_query(conectarBD(), $query);
                                    while ($linha = mysqli_fetch_array($dados)) {
                                        echo '<option name="eSetor" value="' . $linha['ID'] . '">' . $linha['Descricao'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Privilégio:</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" name="ePrivilegio" id="ePrivilegio">
                                    <?php
                                    $query = "SELECT * FROM tb_privilegio WHERE not excluido";
                                    $dados = mysqli_query(conectarBD(), $query);
                                    while ($linha = mysqli_fetch_array($dados)) {
                                        echo '<option name="ePrivilegio" value="' . $linha['ID'] . '">' . $linha['Descricao'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label" style="position:relative; top:7px;">Senha:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="password" class="form-control" name="eSenha" id="eSenha">
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="button" id="editbutton" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Salvar</button>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delmem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Apagar usuário?</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5><center>Nome: <strong><span id="dNome"></span></strong></center></h5> 
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="button" id="delbutton" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Apagar</button>
            </div>
        </div>
    </div>
</div>
