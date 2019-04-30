$(document).ready(function () {
    showTable();

    //add
    $('#add').click(function () {
        $('#addnew').modal('show');
        $('#addForm')[0].reset();
    });

    $('#addbutton').click(function () {
        var first = $('#Nome').val();
        if (first !== '') {
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
                    $('#alerttext').text('Setor adicionado com sucesso!');
                }
            });
        } else {
            alert('Por favor, preencha todos os campos')
        }

    });
    //
    //edit
    $(document).on('click', '.edit', function () {
        var memid = $(this).data('id');
        var first = $('#Nome' + memid).text();
        $('#editmem').modal('show');
        $('#eNome').val(first);
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
                $('#alerttext').text('Setor editado com sucesso!');
            }
        });
    });
    //
    //delete
    $(document).on('click', '.delete', function () {
        var memid = $(this).data('id');
        var first = $('#Nome' + memid).text();
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
                $('#alerttext').text('Setor ' + first + ' apagado!');
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