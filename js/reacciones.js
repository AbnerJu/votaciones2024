let triste = document.getElementById('triste');
let indiferente = document.getElementById('indiferente');

let reacciones = document.querySelectorAll('.reacciones');

// triste.addEventListener('click', saludar);
// indiferente.addEventListener('click', saludar)

// function saludar(){
//     triste.style.cssText= 'translate: 0px -50px;';
// }


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
