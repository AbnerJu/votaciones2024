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
    <link rel="stylesheet" href="css/estadisticas.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Estadisticas</title>
</head>
<body>
    <input type="hidden" id="estadoCarrera" value="<?php echo $_SESSION['estado'];?>">

    <div id="conHidden">
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
    </header>

    <canvas id="myChart" width="200" height="200"></canvas>
    
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

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['5', '4', '3', '2', '1'],
            datasets: [{
            label: '# of Votes',
            data: datosGraficos,
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

    </script>

 
    <script src="js/administrar.js"></script>
</body>
</html>