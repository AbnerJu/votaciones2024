
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_sis.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title></title>
</head>
<body>

    <script>   
        function insertarValor(valor){
            document.getElementById("voto").value = valor;
        }

    </script>

    <div class="conReacciones">

            <button onclick="insertarValor(1)"><img src="./images/cara-triste.png" class="reacciones" id="triste"></button>

            <button onclick="insertarValor(2)"> <img src="./images/indiferente.png" class="reacciones" id="indiferente"></button>

            <button onclick="insertarValor(3)"><img src="./images/cara-neutra.png" class="reacciones" id="neutra"></button>
        
            <button onclick="insertarValor(4)"><img src="./images/sonreir.png" class="reacciones" id="sonreir"></button>
        
            <button onclick="insertarValor(5)"><img src="./images/muy-feliz.png" class="reacciones" id="mFeliz"></button>
    </div>

    <div class="conEnviar">
        <!-- <form action="enviar_votaciones.php" method="POST"> -->
            <input type="hidden" id="voto" name="puntuacion">
            <!-- <input type="text" id="codigoPersona" name="codigoPersona" maxlength="4" autocomplete="on"> -->
            <button id="enviarVoto" type="submit">Enviar Voto</button>
        <!-- </form> -->
    </div>
    <div class="advertencia">
    </div>
    <script src="js/swalvotaciones.js"></script>
    <script src="js/reacciones.js"></script>
</body>
</html>