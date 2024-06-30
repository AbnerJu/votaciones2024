<?php
session_start();
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

$conexion=mysqli_connect("localhost","root","","votaciones_2024") or die("Fallo de conexión al servidor");
$consulta="SELECT id_usuarios,estado,carrera FROM login WHERE carrera='$usuario' AND contraseña='$contraseña'";
$registros=mysqli_query($conexion, $consulta) or die("Error de conexión ".mysqli_error($conexion));
    
if($fila=mysqli_fetch_array($registros)) {
    if($fila['estado']==1) {
        $_SESSION['carrera']=$fila['carrera'];
        header("location:mostrar.php");
    }
    else {
        header("location:login.php?var=1");	
    }	
}
else {
    header("location:login.php?var=2");
}


mysqli_close($conexion);
?>