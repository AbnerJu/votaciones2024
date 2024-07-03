
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_sis.css">
    <title></title>
</head>
<body>

    <script>   
        function insertarValor(valor){
            document.getElementById("voto").value = valor;
        }
    </script>

    <div class="conReacciones">

            <button onclick="insertarValor(1)">
            <img src="./images/cara-triste.png" class="reacciones" id="triste"></button>

            <button onclick="insertarValor(2)"> <img src="./images/indiferente.png" class="reacciones" id="indiferente"></button>

            <button onclick="insertarValor(3)"><img src="./images/cara-neutra.png" class="reacciones" id="neutra"></button>
        
            <button onclick="insertarValor(4)"><img src="./images/sonreir.png" class="reacciones" id="sonreir"></button>
        
            <button onclick="insertarValor(5)"><img src="./images/muy-feliz.png" class="reacciones" id="mFeliz"></button>
    </div>

    <div class="conEnviar">
        <form action="enviar_votaciones.php" method="POST">
            <input type="hidden" id="voto" name="puntuacion">
            <input type="text" id="codigoPersona" name="codigoPersona" maxlength="4" autocomplete="off">
            <br>
            <button type="submit" id="enviarVoto">
                <span class="circulo1"></span>
                <span class="circulo2"></span>
                <span class="circulo3"></span>
                <span class="circulo4"></span>
                <span class="circulo5"></span>
                <span class="circulo6">Enviar Voto</span>
            </button>
        </form>
    </div>
    <div class="advertencia">
    </div>

    <script src="js/reacciones.js"></script>
</body>
</html>