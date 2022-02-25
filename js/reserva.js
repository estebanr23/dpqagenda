(function (){
    "use strict";

    document.addEventListener('DOMContentLoaded', function(){

        // Cambiar estado de reserva
        var btnCerrar = document.getElementById("cerrar-reserva");
        var campoEstado = document.getElementById("estado_reserva");
        var divMensaje = document.getElementById("mensaje-reserva");

        if(btnCerrar) {
            btnCerrar.addEventListener('click', function() {
                swal({
                    title: 'Desea cerrar la reserva?',
                    text: "Una vez cerrada no se podra realizar modificaciones",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Cerrar!',
                    cancelButtonText: 'Cancelar'
                  }).then((result) => {
                        if(result.value) {
                            campoEstado.value = 2;
                                    if(campoEstado.value == 2) { 
                                        swal(
                                            'Correcto',
                                            'La reserva fue cerrada correctamente',
                                            'success'
                                        )
                                        divMensaje.style.display="block";
                                    } else {
                                        swal(
                                            'Error!',
                                            'No se puede cerrar la reserva',
                                            'error'
                                        )
                                    }
                        } // if  
                  }); //then
    
            }); //EventListener

        } // if btnCerrar

    }); // DOMContentLoaded

})();