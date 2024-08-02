<?php
session_start();
include ("conexion.php");

$carrera2 = $_SESSION['vercarrera'];

function ejecutarConsulta($conexion, $consulta)
{
    $resultados = mysqli_query($conexion, $consulta) or die("Error de conexión: " . mysqli_error($conexion));
    $datos = array();

    while ($fila = mysqli_fetch_array($resultados)) {
        $datos[] = $fila[0];
    }

    return $datos[0];
}

$consulta4 = "SELECT COUNT($carrera2) FROM codigos_votaciones WHERE $carrera2=4";
$consulta5 = "SELECT COUNT($carrera2) FROM codigos_votaciones WHERE $carrera2=5";
$consulta3 = "SELECT COUNT($carrera2) FROM codigos_votaciones WHERE $carrera2=3";
$consulta2 = "SELECT COUNT($carrera2) FROM codigos_votaciones WHERE $carrera2=2";
$consulta1 = "SELECT COUNT($carrera2) FROM codigos_votaciones WHERE $carrera2=1";

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

// $respuesta = array($datos5, $datos4, $datos3, $datos2, $datos1);

// $datosGraficos = json_encode($respuesta);

$respuesta = [
    'total' => $datosTotal,
    'votos' => [$datos5[0], $datos4[0], $datos3[0], $datos2[0], $datos1[0]]
];

echo json_encode($respuesta);
header('Content-Type: application/json');

// $datos4 = array();

// while($fila=mysqli_fetch_array($registros)){

//         $datos4[] = $fila['$carrera2'];
// }

// $datos4 = json_encode($datos4);

mysqli_close($conexion);
?>