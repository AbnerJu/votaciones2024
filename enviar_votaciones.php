<?php
    session_start();
    if(isset($_POST['codigoPersona'])){
        $codigoPersona = $_POST['codigoPersona'];
    }

    if(isset($_POST['puntuacion'])){
        $puntuacion = $_POST['puntuacion'];
    }

    $carrera = $_SESSION['carrera'];

    echo $codigoPersona;
    echo $puntuacion;
    echo $carrera;

    $conexion=mysqli_connect("localhost","root","","votaciones_2024") or die ("Error de conexion");
    $consulta= "UPDATE codigos_votaciones SET $carrera = $puntuacion WHERE id_codigo = $codigoPersona";
    mysqli_query($conexion,$consulta) or die ("Error al guardar" . mysqli_error($conexion));
    mysqli_close($conexion);
?>