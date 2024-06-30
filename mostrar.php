<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadisticas</title>
</head>
<body>
    <h1>Mostrar Estadísticas</h1>
    <?php
        session_start();
        echo $_SESSION['carrera'];
    ?>
    <br>
    <button><a href="sis_votacion.php">Sistema de votacion</a></button>
</body>
</html>