
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
    <img src="images/authentication-2-99.png" id="imgInicio">
            <div class="conContenidos">
                <h1>¡Bienvenido!</h1>
                <br>
                <form action="revisar_login.php" method="post">
                    <input type="text" placeholder="Introduce el usuario" class="inpt1" name="usuario">
                    <br>
                    <input type="password" placeholder="Contraseña" class="inpt1" name="contraseña">
                    <br>
                    <button type="submit">
                        Ingresar
                        <div class="arrow-wrapper">
                            <div class="arrow"></div>
                        </div>
                    </button>
                </form>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,256L60,240C120,224,240,192,360,197.3C480,203,600,245,720,229.3C840,213,960,139,1080,90.7C1200,43,1320,21,1380,10.7L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg> -->
</svg>
</body>
</html>