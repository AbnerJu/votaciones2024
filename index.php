<?php
    if(isset($_GET['al'])){
        $al = $_GET['al'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <script src="js/mostrarAlertas.js"></script>
    <script>
        let al1 = <?php echo $al?>;
        if(al1 == 2){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "error",
                title: "Datos incorrectos",
                customClass:{
                    title:"c-titulo"
                }
                });
        }
    </script>
</body>
</html>