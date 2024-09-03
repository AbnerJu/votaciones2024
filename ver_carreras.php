<?php
    session_start();
    $carrera2 = $_GET['val'];
    $_SESSION['vercarrera'] = $carrera2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="icon" href="images/LOGO.png" type="image/x-icon">
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
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="mostrar_carreras.php"><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
              </svg></a>
          </li>
          </ul>
          <div class="d-flex flex-grow-1 justify-content-center">
            <a class="navbar-brand text-center fs-2" href="mostrar.php"><?php echo strtoupper($_SESSION['vercarrera']);?></a>
      </div>
    </nav>

    <div class = "daEstadistica card">
      <h1 class = "mx-auto">Votos totales</h1>
      <h2 class = "numVotos" id="numVotos"></h2>
    </div>

    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active" id = "carro1">
        <div class = "card canva1" id="canva1">
          <canvas id="myChart"></canvas>
        </div>
        <div class = "card canva1" id="canva1">
            <canvas id="myChart4"></canvas>
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
      

      let barChart, pieChart, lineChart, radarChart;

      function actualizarGraficos() {
          fetch('datosgraficos_ver.php')
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Network response was not ok');
                  }
                  return response.json();
              })
              .then(data => {
                  // Actualizar el número total de votos
                  const numVotosElement = document.getElementById('numVotos');
                  if (numVotosElement) {
                      numVotosElement.textContent = data.total;
                  }

                  // Actualizar gráficos
                  actualizarGraficoBarra(data.votos);
                  actualizarGraficoDoughnut(data.votos);
                  actualizarGraficoLinea(data.votos);
                  actualizarGraficoRadar(data.votos);
              })

      }

      function actualizarGraficoBarra(votos) {
          const ctxBar = document.getElementById('myChart').getContext('2d');
          if (!barChart) {
              barChart = new Chart(ctxBar, {
                  type: 'bar',
                  data: {
                      labels: ['Muy Bien', 'Bien', 'Regular', 'Mal', 'Muy mal'],
                      datasets: [{
                          label: 'Número de votos',
                          data: votos,
                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 159, 64, 0.2)',
                              'rgba(255, 205, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(54, 162, 235, 0.2)'
                          ],
                          borderColor: [
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
          } else {
              // Actualiza los datos y vuelve a renderizar el gráfico
              barChart.data.datasets[0].data = votos;
              barChart.update();
          }
      }

      function actualizarGraficoDoughnut(votos) {
          const ctxPie = document.getElementById('myChart2').getContext('2d');
          if (!pieChart) {
              pieChart = new Chart(ctxPie, {
                  type: 'doughnut',
                  data: {
                      labels: ['Muy Bien', 'Bien', 'Regular', 'Mal', 'Muy mal'],
                      datasets: [{
                          label: 'Número de votos',
                          data: votos,
                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 159, 64, 0.2)',
                              'rgba(255, 205, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(54, 162, 235, 0.2)'
                          ],
                          borderColor: [
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
                  options: {
                      responsive: true,
                      aspectRatio: 3
                  }
              });
          } else {
              // Actualiza los datos y vuelve a renderizar el gráfico
              pieChart.data.datasets[0].data = votos;
              pieChart.update();
          }
      }

      function actualizarGraficoLinea(votos) {
          const ctxLine = document.getElementById('myChart3').getContext('2d');
          if (!lineChart) {
              lineChart = new Chart(ctxLine, {
                  type: 'line',
                  data: {
                      labels: ['Muy Bien', 'Bien', 'Regular', 'Mal', 'Muy mal'],
                      datasets: [{
                          label: 'Número de votos',
                          data: votos,
                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 159, 64, 0.2)',
                              'rgba(255, 205, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(54, 162, 235, 0.2)'
                          ],
                          borderColor: [
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
          } else {
              // Actualiza los datos y vuelve a renderizar el gráfico
              lineChart.data.datasets[0].data = votos;
              lineChart.update();
          }
      }

      function actualizarGraficoRadar(votos) {
          const ctxRadar = document.getElementById('myChart4').getContext('2d');
          if (!radarChart) {
              radarChart = new Chart(ctxRadar, {
                  type: 'radar',
                  data: {
                      labels: ['Muy Bien', 'Bien', 'Regular', 'Mal', 'Muy mal'],
                      datasets: [{
                          label: 'Número de votos',
                          data: votos,
                          backgroundColor: 'rgba(255, 99, 132, 0.2)',
                          borderColor: 'rgb(255, 99, 132)',
                          pointHoverBorderColor: 'rgb(255, 99, 132)'
                      }]
                  },
                  options: {
                    responsive: true,
                    aspectRatio: 2
                  }
              });
          } else {
              // Actualiza los datos y vuelve a renderizar el gráfico
              radarChart.data.datasets[0].data = votos;
              radarChart.update();
          }
      }

      document.addEventListener('DOMContentLoaded', actualizarGraficos);
      setInterval(actualizarGraficos, 500);

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/administrar.js"></script>

    <div class="creditos">
			  <p class="texto-creditos">Desarrollado por:</p>
		<ul class="c-fijo">
            <li class="c-cambio">6to.Informatica</li>
            <li class="c-cambio">Abner Jutzuy</li>
            <li class="c-cambio">Jonhatan Orellana</li>
            <li class="c-cambio">Danny Gil</li>
		</ul>
	</div>

    <div class="logo-xp">
        <img src="images/LOGO.png">
    </div>
</body>
</html>

