<?php
    include("conexion.php");

    $carrera = $_GET['val'];
    echo $carrera;

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

    $respuesta = [
        'total' => $datosTotal,
        'votos' => [$datos5[0], $datos4[0], $datos3[0], $datos2[0], $datos1[0]]
    ];

    echo json_encode($respuesta);
    header('Content-Type: application/json');
    header('location:ver_carreras.php?val='. $carrera);

    mysqli_close($conexion);
?>