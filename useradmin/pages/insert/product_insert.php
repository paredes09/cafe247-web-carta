<?php
require_once '../../../forms/config.php';
// Inicializar la respuesta JSON
$response = array('success' => false, 'message' => '');

// Verifica si los datos necesarios están presentes
if (isset($_POST['producto'], $_POST['precio'], $_POST['categoria'], $_POST['estado'])) {
    // Obtén los datos de $_POST
    $nombre = htmlspecialchars($_POST['producto']);
    $descripcion = isset($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion']) : null;
    $precio = doubleval($_POST['precio']);
    $categoria = intval($_POST['categoria']);
    $subcategoria = isset($_POST['subcategoria']) ? intval($_POST['subcategoria']) : null; // Verifica si está seteada
    $estado = intval($_POST['estado']);
    
    // Verifica la conexión
    if ($con) {
        // Verifica si hay datos antes de intentar la inserción
        if (!empty($nombre) && !empty($precio) && !empty($categoria)) {
            // Preparar la consulta SQL utilizando parámetros para evitar SQL Injection
            $sql = "INSERT INTO productos (p_nombre, p_descripcion, p_precio, p_categoria, p_subcat, estado) VALUES (?, ?, ?, ?, ?, ?)";

            // Preparar la consulta
            $stmt = $con->prepare($sql);

            // Verifica si la preparación de la consulta fue exitosa
            if ($stmt) {
                // Vincular los parámetros con la consulta SQL
                $stmt->bind_param("ssdiii", $nombre, $descripcion, $precio, $categoria, $subcategoria, $estado);

                // Ejecutar la consulta
                $stmt->execute();

                // Verifica si la ejecución de la consulta fue exitosa
                if ($stmt->affected_rows > 0) {
                    $response['success'] = true;
                    $response['message'] = "Producto registrado";
                } else {
                    $response['message'] = "Error al insertar el registro: " . $stmt->error;
                }

                // Cerrar la consulta
                $stmt->close();
            } else {
                $response['message'] = "Error en la preparación de la consulta: " . $con->error;
            }
        } else {
          
        }

        // Cerrar la conexión
        $con->close();
    } else {
        $response['message'] = "Error en la conexión a la base de datos.";
    }
}

// Enviar la respuesta JSON al cliente solo si hay datos
if (!empty($response['message'])) {
    echo json_encode($response);
}
?>
