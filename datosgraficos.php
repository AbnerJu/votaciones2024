<?php
    include("conexion.php");

    function ejecutarConsulta($conexion, $consulta) {
        $resultados = mysqli_query($conexion, $consulta) or die("Error de conexión: " . mysqli_error($conexion));
        $datos = array();
    
        while($fila = mysqli_fetch_array($resultados)) {
            $datos[] = $fila[0];
        }
    
        return $datos;
    }

    $consulta5="SELECT COUNT(informatica) FROM codigos_votaciones WHERE informatica=5";
    $consulta4="SELECT COUNT(informatica) FROM codigos_votaciones WHERE informatica=4";
    $consulta3="SELECT COUNT(informatica) FROM codigos_votaciones WHERE informatica=3";
    $consulta2="SELECT COUNT(informatica) FROM codigos_votaciones WHERE informatica=2";
    $consulta1="SELECT COUNT(informatica) FROM codigos_votaciones WHERE informatica=1";

    $datos5 = ejecutarConsulta($conexion, $consulta5);
    $datos4 = ejecutarConsulta($conexion, $consulta4);
    $datos3 = ejecutarConsulta($conexion, $consulta3);
    $datos2 = ejecutarConsulta($conexion, $consulta2);
    $datos1 = ejecutarConsulta($conexion, $consulta1);
    
    
    $respuesta = array(
        "consulta5" => $datos5,
        "consulta4" => $datos4,
        "consulta3" => $datos3,
        "consulta2" => $datos2,
        "consulta1" => $datos1,
    );

    $datosGraficos = json_encode($respuesta);

    // $datos4 = array();

    // while($fila=mysqli_fetch_array($registros)){
        
    //         $datos4[] = $fila['informatica'];
    // }

    // $datos4 = json_encode($datos4);

    mysqli_close($conexion);
?>