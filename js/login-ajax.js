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
                    // setTimeout ejecuta una funcion luego de un cierto tiempo. 2000 = 2seg
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 1000);
                } else {
                    $('.div-mensaje').css('display', 'block');
                }
            }    
        })
    });
});