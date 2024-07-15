let enviar = document.getElementById('enviarVoto');
enviar.addEventListener('click', ()=>{

    (async() =>{
        const {value: codigo} = await Swal.fire({
            title: "Ingresa tu codigo",
            icon: "info",
            input: "text",
            inputValue: '',
            showCancelButton: true,
            confirmButtonText:"Enviar",
            cancelButtonText: "Cancelar",
            customClass: {
                title: 'c-titulo',
                popup: 'c-container',
                input: 'c-input',
                confirmButton: 'c-confirm',
                cancelButton: 'c-cancel'
            }
          });

          if(codigo){
            const formData = new FormData();
            formData.append('codigo', codigo);
            formData.append('puntuacion', document.getElementById('voto').value);

            fetch('enviar_votaciones.php', {
                method: 'POST',
                body: formData
            })

            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al enviar el código.');
                }
                return response.json();
            })
            .then(data => {
                console.log('Respuesta del servidor:', data);
                // Aquí puedes manejar la respuesta del servidor si es necesario
                Swal.fire({
                    title: 'Código enviado',
                    icon: 'success',
                    text: 'El código se ha enviado correctamente.'
                });
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
                Swal.fire({
                    title: 'Error',
                    icon: 'error',
                    text: 'Hubo un error al enviar el código.'
                });
            });
            
          }
    })()
})

