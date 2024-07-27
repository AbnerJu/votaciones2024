<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estadisticas.css">
    <title>Estadisticas</title>
</head>
<body>
    <input type="hidden" id="estadoCarrera" value="<?php echo $_SESSION['estado'];?>">


    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Menu</header>
      <a href="#" class="active">
        <i class="fas fa-qrcode"></i>
        <span>Estadísticas</span>
      </a>
      <a href="sis_votacion.php">
        <i class="fas fa-link"></i>
        <span>Votaciones</span>
      </a>
      <a href="mostrar_carreras.php">
        <i class="fas fa-stream"></i>
        <span>Carreras</span>
      </a>
    </div>

    <header class="encabezado">
        <h1>Estadísticas</h1>
        
        <!-- <a href="sis_votacion.php" class="texto2btn"><button id="btnVotaciones">Votaciones</button><a>

        <a href="mostrar_carreras.php" class="texto2btn"><button id="btnVotaciones">Carreras</button><a> -->
    </header>

    
    <script src="js/administrar.js"></script>
</body>
</html>