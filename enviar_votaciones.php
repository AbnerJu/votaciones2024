<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos si se ha enviado el parámetro "puntuacion"
    if (isset($_POST['puntuacion'])) {
        // Recibimos la puntuacion enviada
        $puntuacion = $_POST['puntuacion'];
        $carrera = $_SESSION['carrera'];

        include("conexion.php");

        // Consulta para insertar la puntuación en la tabla correspondiente a la carrera
        $consulta = "INSERT INTO codigos_votaciones($carrera) VALUES($puntuacion)";

        // Ejecutamos la consulta
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

        // Cerramos la conexión
        mysqli_close($conexion);

        // Enviamos la respuesta en formato JSON
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
