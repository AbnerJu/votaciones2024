<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $conexion = mysqli_connect("sql206.infinityfree.com", "if0_36938062", "HctaCt5Ekow2", "if0_36938062_votaciones_2024") or die("Error de conexión");

        $consulta = "SHOW COLUMNS FROM codigos_votaciones";

        $registros = mysqli_query($conexion,$consulta) or die("Error al guardar " . mysqli_error($conexion));

        $columna_fuera = "id_codigo";
    

        echo "<div id='conPrincipal'>";
        while($fila=mysqli_fetch_array($registros)){
            if($fila['Field'] !== $columna_fuera){

                
                echo "<div id='conCards'>" . strtoupper($fila['Field']). "</div>";
            }
        }
        echo "</div>";

        mysqli_close($conexion);
    ?>
    
</body>
</html>