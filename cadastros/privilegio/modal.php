<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Adicionar novo privilégio</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="">
                    <form id="addForm">
                        <div class="form-group">
                            <label for="Descricao">Descrição</label>
                            <input type="text" class="form-control" id="Descricao" name="Descricao" aria-describedby="helpDescricao" placeholder="">
                            <small id="helpDescricao" class="form-text text-muted">Preencha uma descrição clara do privilégio</small>
                        </div>
                        <!--                        <div class="form-check"> TODO: AINDA NÃO HA CONFIGURACAO NO SISTEMA
                                                    <input type="checkbox" class="form-check-input" name="EditaConfiguracao" id="EditaConfiguracao"> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label class="form-check-label" for="EditaConfiguracao">Edita configuração</label>
                                                </div>-->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="CadastraPrivilegio" id="CadastraPrivilegio"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="CadastraPrivilegio">Cadastra Privilégio</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" style=""  name="CadastraPessoa" id="CadastraPessoa"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="CadastraPessoa">Cadastra Pessoa</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" style=""  name="CadastraSetor" id="CadastraSetor"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="CadastraSetor">Cadastra Setor</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" style=""  name="CadastraUsuario" id="CadastraUsuario"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="CadastraUsuario">Cadastra Usuário</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" style=""  name="GeraEtiqueta" id="GeraEtiqueta"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="GeraEtiqueta">Gerar etiqueta</label>
                        </div>
                        <div class="form-group"><br>
                            <label for="TimeOut">Timeout da Sessão (minutos)</label>
                            <input type="number" onkeyup="this.value = this.value.replace(/[^\d]/, '')" class="form-control" id="TimeOut" name="TimeOut" value="30" placeholder="">
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
                <center><h4 class="modal-title" id="myModalLabel">Editar privilégio</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="Descricao">Descrição</label>
                            <input type="text" class="form-control" id="e_Descricao" name="e_Descricao" aria-describedby="helpDescricao" placeholder="">
                            <small id="e_helpDescricao" class="form-text text-muted">Preencha uma descrição clara do privilégio</small>
                        </div>
                        <!--                        <div class="form-check"> TODO: AINDA NÃO HA CONFIGURACAO NO SISTEMA
                                                    <input type="checkbox" class="form-check-input" name="e_EditaConfiguracao" id="e_EditaConfiguracao"> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label class="form-check-label" for="e_EditaConfiguracao">Edita configuração</label>
                                                </div>-->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="e_CadastraPrivilegio" id="e_CadastraPrivilegio"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="e_CadastraPrivilegio">Cadastra Privilégio</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" style=""  name="e_CadastraPessoa" id="e_CadastraPessoa"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="e_CadastraPessoa">Cadastra Pessoa</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" style=""  name="e_CadastraSetor" id="e_CadastraSetor"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="e_CadastraSetor">Cadastra Setor</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" style=""  name="e_CadastraUsuario" id="e_CadastraUsuario"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="e_CadastraUsuario">Cadastra Usuário</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" style=""  name="e_GeraEtiqueta" id="e_GeraEtiqueta"> &nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="e_GeraEtiqueta">Gerar etiqueta</label>
                        </div>
                        <div class="form-group"><br>
                            <label for="e_TimeOut">Timeout da Sessão (minutos)</label>
                            <input type="number" onkeyup="this.value = this.value.replace(/[^\d]/, '')" class="form-control" id="e_TimeOut" name="e_TimeOut" placeholder="">
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
                <center><h4 class="modal-title" id="myModalLabel">Apagar privilégio?</h4></center>
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
