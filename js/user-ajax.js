$(document).ready(function() {
    $('#form-agenda').on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType:'json',
            success: function(data) {
                var resultado = data;
                if(resultado.respuesta == 'exito') {
                    swal(
                        'Correcto',
                        'Se guardo correctamente',
                        'success'
                      )
                } else {
                    swal(
                        'Error!',
                        'Hubo un error',
                        'error'
                    )
                }
            }
        })
    })
});