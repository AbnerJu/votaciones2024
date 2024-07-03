let triste = document.getElementById('triste');
let indiferente = document.getElementById('indiferente');
let neutra = document.getElementById('neutra');
let sonreir = document.getElementById('sonreir');
let mFeliz = document.getElementById('mFeliz');
let fondo = document.body;

let reacciones = document.querySelectorAll('.reacciones');

reacciones.forEach(reaccion => {
    reaccion.addEventListener('click', () => {
        reacciones.forEach(otraReaccion => {
            if (otraReaccion !== reaccion) {
                otraReaccion.classList.remove("movimiento");
            }
        });
        reaccion.classList.toggle("movimiento");
    });
});

triste.addEventListener('click',()=>{{
    fondo.style.background="#e0435a";
}})

indiferente.addEventListener('click',()=>{{
    fondo.style.background="#f4911a";
}})

neutra.addEventListener('click',()=>{{
    fondo.style.background="#fbe23d";
}})

sonreir.addEventListener('click',()=>{{
    fondo.style.background="#6fb96a";
}})

mFeliz.addEventListener('click',()=>{{
    fondo.style.background="#3dafb7";
}})

// triste.addEventListener('click',funTriste);
// function funTriste(){
//     fondo.style.background="#e0435a";
// }
