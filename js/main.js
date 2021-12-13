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
