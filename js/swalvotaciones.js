// Función para insertar el valor de la puntuación seleccionada
function insertarValor(valor) {
    document.getElementById("voto").value = valor;
}

// Función para iniciar el contador y deshabilitar el botón
function iniciarContador() {
    const botonEnviar = document.getElementById('enviarVoto');
    let contador = 10;


    botonEnviar.disabled = true;

    Swal.fire({
        title: 'Voto enviado',
        html: `Puedes enviar otro voto en <b>${contador}</b> segundos.`,
        timer: contador * 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector('b');
            const interval = setInterval(() => {
                contador--;
                b.textContent = contador;
            }, 1000);
        },
        willClose: () => {
            clearInterval();
        }
    }).then(() => {

        botonEnviar.disabled = false;
    });
}


document.getElementById('enviarVoto').addEventListener('click', () => {
    const formData = new FormData();
    formData.append('puntuacion', document.getElementById('voto').value);


    fetch('enviar_votaciones.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al enviar la votación.');
        }
        return response.json();
    })
    .then(data => {
        console.log('Respuesta del servidor:', data);
        Swal.fire({
            title: 'Voto enviado',
            icon: 'success',
            text: 'El voto se ha enviado correctamente.'
        });
        // Iniciar el contador después de enviar el voto
        iniciarContador();
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        Swal.fire({
            title: 'Error',
            icon: 'error',
            text: 'Selecciona una reaccion.'
        });
    });
});



