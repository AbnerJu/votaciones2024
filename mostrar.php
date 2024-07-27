<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estadisticas.css">
    <title>Estadisticas</title>
</head>
<body>
    <input type="hidden" id="estadoCarrera" value="<?php echo $_SESSION['estado'];?>">

    <header class="encabezado">
        <h1>Estadísticas</h1>
        <a href="sis_votacion.php" class="texto2btn"><button id="btnVotaciones">Votaciones</button><a>
            
        <a href="mostrar_carreras.php" class="texto2btn"><button id="btnVotaciones">Carreras</button><a>
    </header>
    <script src="js/administrar.js"></script>
</body>
</html>