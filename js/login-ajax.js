$(document).ready(function() {
    // Id del formulario
    $('#login-admin').on('submit', function(e) {
        e.preventDefault(); 

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'), 
            data: datos, 
            url: $(this).attr('action'), 
            dataType: 'json', 
            success: function(data) { 
                var resultado = data;
                if(resultado.respuesta == 'exitoso') {
                        window.location.href = 'index.php';
                } else {
                    $('.div-mensaje').css('display', 'block');
                }
            }    
        })
    });
});