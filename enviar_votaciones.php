<?php
    session_start();
    // if(isset($_POST['codigoPersona'])){
    //     $codigoPersona = $_POST['codigoPersona'];
    // }

    // if(isset($_POST['puntuacion'])){
    //     $puntuacion = $_POST['puntuacion'];
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificamos si se ha enviado el parámetro 'codigo'
        if (isset($_POST['codigo'])  && isset($_POST['puntuacion'])) {
            // Recibimos el código enviado desde JavaScript
            $codigo = $_POST['codigo'];
            $puntuacion = $_POST['puntuacion'];
            $carrera = $_SESSION['carrera'];

            $conexion=mysqli_connect("localhost","root","","votaciones_2024") or die ("Error de conexion");
            $consulta= "UPDATE codigos_votaciones SET $carrera = $puntuacion WHERE id_codigo = $codigo";
            mysqli_query($conexion,$consulta) or die ("Error al guardar" . mysqli_error($conexion));
            mysqli_close($conexion);
            // Aquí puedes realizar las operaciones necesarias con el código
            // Por ejemplo, puedes guardar el código en una base de datos, realizar alguna operación, etc.
    
            // En este ejemplo, simplemente devolvemos una respuesta JSON indicando éxito
            $response = array(
                'success' => true,
                'message' => 'Código recibido correctamente: ' . $codigo
            );
    
            // Devolvemos la respuesta en formato JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Si no se recibió el parámetro 'codigo'
            $response = array(
                'success' => false,
                'message' => 'No se recibió el código.'
            );
    
            // Devolvemos la respuesta en formato JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } else {
        // Si la solicitud no es POST, devolvemos un error
        $response = array(
            'success' => false,
            'message' => 'Método no permitido. Se esperaba una solicitud POST.'
        );
    
        // Devolvemos la respuesta en formato JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }




?>