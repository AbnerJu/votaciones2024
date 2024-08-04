<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/comparar.css">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li> -->
                </ul>
                <div class="d-flex flex-grow-1 justify-content-center">
                    <a class="navbar-brand text-center fs-2" href="mostrar.php">Comparar carreras</a>
                </div>
    </nav>
    <form action="datos_comparar.php" method="POST">
    <div class="form-floating select1">
        <select class="form-select" id="carrera1" aria-label="Floating label select example">
            <option>Selecciona una carrera</option>
            <?php
            include ("conexion.php");

            $consulta = "SHOW COLUMNS FROM codigos_votaciones";

            $registros = mysqli_query($conexion, $consulta) or die("Error al guardar " . mysqli_error($conexion));

            $columna_fuera = "id_codigo";

            echo "<div id='conPrincipal'>";
            while ($fila = mysqli_fetch_array($registros)) {
                if ($fila['Field'] !== $columna_fuera) {
                    $respuesta = $fila['Field'];
                    echo '
                    <option value='."$respuesta".'>' . $respuesta . '</option>
                    ';
                }
            }
            echo "</div>";

            mysqli_close($conexion);
            ?>
        </select>
        <label for="floatingSelect">Works with selects</label>
    </div>

    <div class="form-floating select1">
        <select class="form-select" id="carrera2" aria-label="Floating label select example">
            <option selected>Selecciona una carrera</option>
            <?php
            include ("conexion.php");

            $consulta = "SHOW COLUMNS FROM codigos_votaciones";

            $registros = mysqli_query($conexion, $consulta) or die("Error al guardar " . mysqli_error($conexion));

            $columna_fuera = "id_codigo";

            echo "<div id='conPrincipal'>";
            while ($fila = mysqli_fetch_array($registros)) {
                if ($fila['Field'] !== $columna_fuera) {
                    $respuesta = $fila['Field'];
                    echo '
                    <option value='."$respuesta".'>' . $respuesta . '</option>
                    ';
                }
            }
            echo "</div>";

            mysqli_close($conexion);
            ?>
        </select>
        <label for="floatingSelect">Works with selects</label>
    </div>
    <button class="btn btn-primary">Comparar</button>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
        <script src="js/comparar.js"></script>
</body>

</html>