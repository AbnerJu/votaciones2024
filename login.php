<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>idealogin</title>
</head>
<body>
    <div id = "conPrincipal">
        <div class="conIzq" id="conInter">
            <!-- <div class="conImagen"></div> -->
        </div>

        <div class="conDer" id="conInter">
            <div class="conContenidos">
                <h1>¡Bienvenido!</h1>
                <br>
                <form action="revisar_login.php" method="post">
                    <input type="text" placeholder="Introduce el usuario" class="inpt1" name="usuario">
                    <br>
                    <input type="password" placeholder="Contraseña" class="inpt1" name="contraseña">
                    <br>
                    <input type="submit" value="Ingresar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>