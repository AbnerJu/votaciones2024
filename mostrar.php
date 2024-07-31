<?php
    session_start();
    include("datosgraficos.php");
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

    <!-- <div id="conHidden">
        <input type="checkbox" id="check">
        <label for="check">
          <i class="fas fa-bars" id="btn"></i>
          <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
          <header>Menu</header>
          </a>
          <a href="sis_votacion.php" class="aSidebar">
            <i class="fas fa-link"></i>
            <span>Votaciones</span>
          </a>
          <a href="mostrar_carreras.php" class="aSidebar">
            <i class="fas fa-stream"></i>
            <span>Carreras</span>
          </a>
        </div>
    </div>

    <header class="encabezado" id="header">
        <h1>Estadísticas</h1>  
        <a href="sis_votacion.php" class="texto2btn"><button id="btnVotaciones">Votaciones</button><a>
    </header> -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <li class="nav-item dropdown" id="dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Acciones
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="mostrar_carreras.php">Carreras</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <div class="d-flex flex-grow-1 justify-content-center">
            <a class="navbar-brand text-center fs-2" href="mostrar.php">Estadísticas</a>
          </div>
            <a href="sis_votacion.php" class="btn btn-dark btn-custom">Votaciones</a>
        </div>
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