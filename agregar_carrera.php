<?php
if (isset($_GET['msj'])) {
    $msj = $_GET['msj'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_agregar.css">
    <link rel="icon" href="images/LOGO1.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>idealogin</title>
</head>

<body>
    <div id="conPrincipal">
        <img src="images/Upload.png" id="imgInicio">
        <div class="conContenidos">
            <h1>Agregar Carrera</h1>
            <br>
            <form action="insertar_carrera.php" method="post">
                <input type="text" placeholder="Usuario" class="inpt1" name="usuario">
                <br>
                <input type="password" placeholder="Contraseña" class="inpt1" name="contraseña">
                <br>
                <div class="con-botones">
                    <button type="submit" class="btn-add">
                        <div class="text-button">Agregar</div>
                        <div class="arrow-wrapper">
                            <div><img src="images/add-circle.svg" class="add"></div>
                        </div>
                    </button>
                    <a href="mostrar.php" class="btn-regresar">
                        <div class="text-button">Regresar</div>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </script>
    <script>
        let msj1 = <?php echo $msj ?>;
        if (msj1 == 1) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 4500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Datos agregados correctamente",
                customClass: {
                    title: "c-titulo"
                }
            });
        } else {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "No se pudo gurdar los datos",
                text: "Rellene todos los campos",
                customClass: {
                    title: "c-titulo",
                    text: "c-titulo"
                }
            });
        }
    </script>

    <div class="logo-xp">
        <img src="images/LOGO1.png">
    </div>
</body>

</html>