<?php
if (isset($_POST['usuario']) && isset($_POST['contraseña']) && !empty($_POST['usuario']) && !empty($_POST['contraseña'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    include ('conexion.php');
    $consulta = "INSERT INTO login(carrera,contraseña,estado) VALUES('$usuario','$contraseña',1)";
    $registros = mysqli_query($conexion, $consulta) or die("Error de conexión " . mysqli_error($conexion));

    $consulta2 = "ALTER TABLE `codigos_votaciones` ADD `$usuario` INT NOT NULL AFTER `id_codigo`";
    $registros2 = mysqli_query($conexion, $consulta2) or die("Error de conexión " . mysqli_error($conexion));
    mysqli_close($conexion);

    header("location:agregar_carrera.php?msj=1");
}else{
    header("location:agregar_carrera.php?msj=2");
}
?>