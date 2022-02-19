(function(){
    "use strict";

    document.addEventListener('DOMContentLoaded', function(){

        // Mostrar botones de reserva y agendar
        var lista = document.getElementById("lista-vehiculos");
        var botones;

        if(lista) {
            lista.addEventListener('mouseover', function({target}) {
                if(target.tagName === "ARTICLE") {
                    botones = target.querySelector(".after-btn");
                    botones.style.display="block";
    
                    botones.addEventListener('mouseleave', function() {
                        botones.style.display="none";
                    })
                }
                
            });
        }

        // Mostrar opciones de Sub Menu
        var usuario = document.getElementById("usuario-menu");
        var opciones = document.getElementById("opciones-menu");
        var subMenu = document.querySelector(".sub-menu");
        
        usuario.addEventListener('mouseenter', function() {
            opciones.style.display="block";
        });

        subMenu.addEventListener('mouseleave', function() {
            opciones.style.display="none";
        });

    }); // DOM CONTENT LOADED

})();