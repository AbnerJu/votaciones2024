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

    <canvas id="myChart" width="50" height="20"></canvas>
    <canvas id="myChart2" width="50" height="50"></canvas>
    
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

        // const ctxPolar = document.getElementById('myChart2');

        // new Chart(ctxPolar,{
        //     type: 'polarArea',
        //     data: {
        //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple'],
        //         datasets: [{
        //             label: '# of Votes',
        //             data: datosGraficos,
        //             backgroundColor: [
        //             'rgba(255, 99, 132, 0.2)',
        //             'rgba(54, 162, 235, 0.2)',
        //             'rgba(255, 206, 86, 0.2)',
        //             'rgba(75, 192, 192, 0.2)',
        //             'rgba(153, 102, 255, 0.2)',
        //             ],
        //             borderColor: [
        //             'rgba(255, 99, 132, 1)',
        //             'rgba(54, 162, 235, 1)',
        //             'rgba(255, 206, 86, 1)',
        //             'rgba(75, 192, 192, 1)',
        //             'rgba(153, 102, 255, 1)',
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         plugins: {
        //         legend: {
        //             position: 'top',
        //         },
        //         title: {
        //             display: true,
        //             text: 'Chart.js Polar Area Chart'
        //         }
        //         }
        //     }
        // })

        setInterval("location.reload()",6000);

    </script>

 
    <script src="js/administrar.js"></script>
</body>
</html>