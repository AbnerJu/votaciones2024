<?php
    session_start();
    include("conexion.php");

    $carrera = $_GET['val'];


    function ejecutarConsulta($conexion, $consulta) {
        $resultados = mysqli_query($conexion, $consulta) or die("Error de conexión: " . mysqli_error($conexion));
        $datos = array();
    
        while($fila = mysqli_fetch_array($resultados)) {
            $datos[] = $fila[0];
        }
    
        return $datos[0];
    }

    $consulta4="SELECT COUNT($carrera) FROM codigos_votaciones WHERE $carrera=4";
    $consulta5="SELECT COUNT($carrera) FROM codigos_votaciones WHERE $carrera=5";
    $consulta3="SELECT COUNT($carrera) FROM codigos_votaciones WHERE $carrera=3";
    $consulta2="SELECT COUNT($carrera) FROM codigos_votaciones WHERE $carrera=2";
    $consulta1="SELECT COUNT($carrera) FROM codigos_votaciones WHERE $carrera=1";

    $datos5 = ejecutarConsulta($conexion, $consulta5);
    $datos4 = ejecutarConsulta($conexion, $consulta4);
    $datos3 = ejecutarConsulta($conexion, $consulta3);
    $datos2 = ejecutarConsulta($conexion, $consulta2);
    $datos1 = ejecutarConsulta($conexion, $consulta1);

    $datosTotal = $datos5 + $datos4 + $datos3 + $datos2 + $datos1;
    
    
    // $respuesta = array(
    //     "consulta5" => $datos5,
    //     "consulta4" => $datos4,
    //     "consulta3" => $datos3,
    //     "consulta2" => $datos2,
    //     "consulta1" => $datos1,
    // );

    $respuesta = array($datos5, $datos4, $datos3, $datos2, $datos1);

    $datosGraficos = json_encode($respuesta);

    // $datos4 = array();

    // while($fila=mysqli_fetch_array($registros)){
        
    //         $datos4[] = $fila['$carrera'];
    // }

    // $datos4 = json_encode($datos4);

    mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/estadisticas.css">
    <title>Estadisticas</title>
</head>
<body>
    <input type="hidden" id="estadoCarrera" value="<?php echo $_SESSION['estado'];?>">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <a class="nav-link active" aria-current="page" href="mostrar_carreras.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg></a>
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li> -->
          </ul>
          <div class="d-flex flex-grow-1 justify-content-center">
            <a class="navbar-brand text-center fs-2" href="mostrar.php"><?php echo strtoupper($carrera);?></a>
      </div>
    </nav>

    <div class = "daEstadistica card">
      <h1 class = "mx-auto">Votos totales</h1>
      <h2 class = "numVotos" ><?php echo $datosTotal;?></h2>
    </div>

    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
        <div class = "card canva1">
          <canvas id="myChart" width="20" height="7"></canvas>
        </div>
        </div>
        <div class="carousel-item">
          <div class = "card canva1" id="canvaPie">
            <canvas id="myChart2" width="10" height="10"></canvas>
          </div>
        </div>
        <div class="carousel-item">
          <div class = "card canva1" id="canvaLine">
            <canvas id="myChart3" width="20" height="7"></canvas>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    
    <script>
        function crearCadena(json){
            var parsed = JSON.parse(json);
            var arr = [];
            for(var x in parsed){
                arr.push(parsed[x]);
            }
            return arr;
        }

        datosGraficos = crearCadena('<?php echo $datosGraficos?>');
    </script>

    <script>

        console.log(datosGraficos);

        const ctxBar = document.getElementById('myChart');

        new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Muy Bien', 'Bien', 'Regular', 'Mal', 'Muy mal'],
            datasets: [{
            label: 'Numero de votos',
            data: datosGraficos,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)'
            ],
            borderColor:[
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)'
            ],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        const ctxPie = document.getElementById('myChart2');
        new Chart(ctxPie,{
          type: 'doughnut',
          data: {
            labels: ['Muy Bien', 'Bien', 'Regular', 'Mal', 'Muy mal'],
            datasets: [{
            label: 'Numero de votos',
            data: datosGraficos,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)'
            ],
            borderColor:[
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)'
            ],
            borderWidth: 1,
            hoverOffset: 4
            }]
        },
        options:{
          responsive: true,
          aspectRatio: 3
        }
          
        });

        const ctxLine = document.getElementById('myChart3');
        new Chart(ctxLine,{
          type: 'line',
          data: {
            labels: ['Muy Bien', 'Bien', 'Regular', 'Mal', 'Muy mal'],
            datasets: [{
            label: 'Numero de votos',
            data: datosGraficos,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)'
            ],
            borderColor:[
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)'
            ],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });
        // setInterval("location.reload()",6000);

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/administrar.js"></script>
</body>
</html>