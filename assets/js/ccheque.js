function editar_feriado(id) {
    $.ajax({
        url: 'feriado/editar',
        type: 'POST',
        data: { id: id },
        beforeSend: function () {
            $('#edit_modal').find('modal_body').html('Carregando');
            $('#edit_modal').modal('show');
        },
        success: function (html) {
            console.log(html);
            $('#edit_modal').find('.modal-body').html(html);
            $('#edit_modal').modal('show');
        }
    });

}

function deletar_feriado(id) {
    Swal.fire({
        title: 'Deseja realmente deletar este feriado?',
        text: 'Não será possível reverter a exclusão!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Não, cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'feriado/deletar',
                type: 'POST',
                data: { id: id },
                success: function () {
                    Swal.fire(
                        'Deletado!',
                        'O feriado foi deletado do sistema.',
                        'success'
                    ).then((result) => {
                        if (result.value) {
                            window.location.href = window.location.href;
                        }
                    })


                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.close()
        }
    })

} 
