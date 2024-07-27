<?php
    $bdnombre = "votaciones_2024";
    $bdusuario = "root";
    $bdhost = "localhost";
    $bdcontraseña = "";

    $conexion = mysqli_connect($bdhost, $bdusuario, $bdcontraseña, $bdnombre) or die ("Error de conexion");

    $conexion->set_charset("utf8mb4");
?>