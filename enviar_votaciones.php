<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['puntuacion'])) {
        $puntuacion = $_POST['puntuacion'];
        $carrera = $_SESSION['carrera'];

        include("conexion.php");

        $consulta = "INSERT INTO codigos_votaciones($carrera) VALUES($puntuacion)";

        if (mysqli_query($conexion, $consulta)) {
            $response = array(
                'success' => true,
                'message' => 'Voto registrado exitosamente.'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Error al guardar la votación: ' . mysqli_error($conexion)
            );
        }
        mysqli_close($conexion);

        header('Content-Type: application/json');
        echo json_encode($response);

    } else {
        // Si no se recibió 'puntuacion'
        $response = array(
            'success' => false,
            'message' => 'No se recibió la puntuación.'
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    // Si la solicitud no es POST
    $response = array(
        'success' => false,
        'message' => 'Método no permitido. Se esperaba una solicitud POST.'
    );

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
