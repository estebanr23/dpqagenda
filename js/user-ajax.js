$(document).ready(function() {
    // Formulario reserva        
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

    // Formulario cliente        
    $('#form-cliente').on('submit', function(e) {
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
                        'Cliente creado correctamente',
                        'success'
                      )
                    // setTimeout ejecuta una funcion luego de un cierto tiempo. 2000 = 2seg
                    setTimeout(function() {
                        window.location.href = 'formAgenda.php';
                    }, 2000);

                } else if (resultado.respuesta == 'existente') {
                    swal(
                        'Correcto',
                        'El cliente ya existe',
                        'success'
                      )
                    setTimeout(function() {
                        window.location.href = 'formAgenda.php';
                    }, 2000);

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
