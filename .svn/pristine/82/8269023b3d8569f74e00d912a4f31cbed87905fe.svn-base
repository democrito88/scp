$(document).ready(function () {
    showTable();

    //add
    $('#add').click(function () {
        $('#addnew').modal('show');
        $('#addForm')[0].reset();
    });

    $('#addbutton').click(function () {
        var descricao = $('#Descricao').val();
        var timeout = $('#TimeOut').val();
        if (descricao !== '' && timeout !== '') {
            var addForm = $('#addForm').serialize();
            $.ajax({
                type: 'POST',
                url: 'add.php',
                data: addForm,
                success: function () {
                    $('#addnew').modal('hide');
                    $('#addForm')[0].reset();
                    showTable();
                    $('#alert').slideDown();
                    $('#alerttext').text('Privilégio adicionado com sucesso!');
                }
            });
        } else {
            alert('Por favor, preencha a descrição e o timeout');
        }

    });
    //
    //edit
    $(document).on('click', '.edit', function () {
        var memid = $(this).data('id');
        var descricao = $('#Descricao' + memid).text();
//        var editaConfiguracao = $('#EditaConfiguracao' + memid).text();
        var cadastraPrivilegio = $('#CadastraPrivilegio' + memid).text() === 'Sim' ? 1 : 0;
        var cadastraPessoa = $('#CadastraPessoa' + memid).text() === 'Sim' ? 1 : 0;
        var cadastraSetor = $('#CadastraSetor' + memid).text() === 'Sim' ? 1 : 0;
        var cadastraUsuario = $('#CadastraUsuario' + memid).text() === 'Sim' ? 1 : 0;
        var geraEtiqueta = $('#GeraEtiqueta' + memid).text() === 'Sim' ? 1 : 0;
        var timeOut = $('#TimeOut' + memid).text();
        $('#editmem').modal('show');
        $('#e_Descricao').val(descricao);
        $("#e_CadastraPrivilegio").prop("checked", cadastraPrivilegio);
        $("#e_CadastraPessoa").prop("checked", cadastraPessoa);
        $("#e_CadastraSetor").prop("checked", cadastraSetor);
        $("#e_CadastraUsuario").prop("checked", cadastraUsuario);
        $("#e_GeraEtiqueta").prop("checked", geraEtiqueta);
        $('#e_TimeOut').val(timeOut);
        $('#editbutton').val(memid);
    });

    $('#editbutton').click(function () {
        var memid = $(this).val();
        var editForm = $('#editForm').serialize();
        $.ajax({
            type: 'POST',
            url: 'edit.php',
            data: editForm + "&memid=" + memid,
            success: function () {
                $('#editmem').modal('hide');
                $('#editForm')[0].reset();
                showTable();
                $('#alert').slideDown();
                $('#alerttext').text('Privilégio editado com sucesso!');
            }
        });
    });
    //
    //delete
    $(document).on('click', '.delete', function () {
        var memid = $(this).data('id');
        var first = $('#Descricao' + memid).text();
        $('#delmem').modal('show');
        $('#dNome').text(first);
        $('#delbutton').val(memid);
    });

    $('#delbutton').click(function () {
        var memid = $(this).val();
        var first = $('#Nome' + memid).text();
        $.ajax({
            type: 'POST',
            url: 'delete.php',
            data: {
                memid: memid,
            },
            success: function () {
                $('#delmem').modal('hide');
                showTable();
                $('#alert').slideDown();
                $('#alerttext').text('Privilégio ' + first + ' apagado!');
            }
        });
    });

});

function showTable() {
    $.ajax({
        type: 'POST',
        url: 'fetch.php',
        data: {
            fetch: 1
        },
        success: function (data) {
            $('#table').html(data);
        }
    });
}

