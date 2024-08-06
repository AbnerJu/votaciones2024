<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificamos si se ha enviado el parámetro "codigo"
        if (isset($_POST['codigo'])  && isset($_POST['puntuacion'])) {
            // Recibimos el código enviado
            $codigo = $_POST['codigo'];
            $puntuacion = $_POST['puntuacion'];
            $carrera = $_SESSION['carrera'];

            include("conexion.php");
            $consulta= "UPDATE codigos_votaciones SET $carrera = $puntuacion WHERE id_codigo = $codigo";
            mysqli_query($conexion,$consulta) or die ("Error al guardar" . mysqli_error($conexion));
            mysqli_close($conexion);

            $response = array(
                'success' => true,
                'message' => 'Código recibido: ' . $codigo
            );
    
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Si no se recibió 'codigo'
            $response = array(
                'success' => false,
                'message' => 'No se recibió el código.'
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