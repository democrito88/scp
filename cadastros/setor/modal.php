<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Adicionar novo setor</h4></center>
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
                <center><h4 class="modal-title" id="myModalLabel">Editar setor</h4></center>
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
                <center><h4 class="modal-title" id="myModalLabel">Apagar setor?</h4></center>
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
