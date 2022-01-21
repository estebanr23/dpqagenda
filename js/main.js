// Mostrar botones de reserva y agendar
var lista = document.getElementById("lista-vehiculos");
var botones;

lista.addEventListener('mouseover', function({target}) {
    if(target.tagName === "ARTICLE") {
        botones = target.querySelector(".after-btn");
        botones.style.display="block";

        botones.addEventListener('mouseleave', function() {
            botones.style.display="none";
        })
    }
    
})


// Cambiar estado de reserva
/*
var btnCerrar = document.getElementById("cerrar-reserva");
var campoEstado = document.getElementById("estado_reserva");
btnCerrar.addEventListener('click', function() {
    campoEstado.value = 2;
    console.log(campoEstado.value);
});
*/