<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="mostrar.php"><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
              </svg></a>
          </li>
        </ul>
        <div class="d-flex flex-grow-1 justify-content-center">
          <a class="navbar-brand text-center fs-2" href="mostrar_carreras.php">Carreras</a>
        </div>
  </nav>
  <?php
  include ("conexion.php");

  $consulta = "SHOW COLUMNS FROM codigos_votaciones";

  $registros = mysqli_query($conexion, $consulta) or die("Error al guardar " . mysqli_error($conexion));

  $columna_fuera = "id_codigo";

  echo "<div id='conPrincipal'>";
  while ($fila = mysqli_fetch_array($registros)) {
    if ($fila['Field'] !== $columna_fuera) {

      $respuesta = $fila['Field'];
      $consulta1 = "SELECT COUNT($respuesta) FROM codigos_votaciones WHERE $respuesta=1";
      $consulta2 = "SELECT COUNT($respuesta) FROM codigos_votaciones WHERE $respuesta=2";
      $consulta3 = "SELECT COUNT($respuesta) FROM codigos_votaciones WHERE $respuesta=3";
      $consulta4 = "SELECT COUNT($respuesta) FROM codigos_votaciones WHERE $respuesta=4";
      $consulta5 = "SELECT COUNT($respuesta) FROM codigos_votaciones WHERE $respuesta=5";

      $datos1 = ejecutarConsulta($conexion, $consulta1);
      $datos2 = ejecutarConsulta($conexion, $consulta2);
      $datos3 = ejecutarConsulta($conexion, $consulta3);
      $datos4 = ejecutarConsulta($conexion, $consulta4);
      $datos5 = ejecutarConsulta($conexion, $consulta5);

      // Calcular el total de votos
      $datosTotal = $datos1 + $datos2 + $datos3 + $datos4 + $datos5;
      $datoMeGusta = $datos4 + $datos4;
      $datoNoMeGusta = $datos1 + $datos2 + $datos3;

      echo "<a class='card' id = 'conCards' href='ver_carreras.php?val=$respuesta'><div class='con-titulo'>" . strtoupper($respuesta) . "
      </div><div class='con-total'>
        Total de reacciones :  
        <div class='num-total'>$datosTotal</div>
      </div>
      <div class='principal-reaccion'>
        <div class='con-reaccion me-gusta'><img class='reaccion' src='images/me-gusta.png'>$datoMeGusta</div>
        <div class='con-reaccion no-me-gusta'><img class='reaccion' src='images/no-me-gusta.png'>$datoNoMeGusta</div>
      </div>
      </a>";
    }
  }
  echo "</div>";

  function ejecutarConsulta($conexion, $consulta)
  {
    $resultados = mysqli_query($conexion, $consulta) or die("Error de conexión: " . mysqli_error($conexion));
    $datos = array();

    while ($fila = mysqli_fetch_array($resultados)) {
      $datos[] = $fila[0];
    }

    return $datos[0];
  }

  mysqli_close($conexion);
  ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>