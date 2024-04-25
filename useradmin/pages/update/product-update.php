<?php
require_once '../../../forms/config.php';
// Inicializar la respuesta JSON
$response = array('success' => false, 'message' => '');

// Verifica si los datos necesarios están presentes
if (isset($_POST['producto_actualizado'], $_POST['precio_actualizado'], $_POST['categoria_actualizado'], $_POST['estado_actualizado'] , $_POST['id_producto'])) {
    // Obtén los datos de $_POST
    $id_producto = intval($_POST['id_producto']);
    $nombre = htmlspecialchars($_POST['producto_actualizado']);
    $descripcion = isset($_POST['descripcion_actualizado']) ? htmlspecialchars($_POST['descripcion_actualizado']) : null;
    $precio = doubleval($_POST['precio_actualizado']);
    $categoria = intval($_POST['categoria_actualizado']);
    $subcategoria = isset($_POST['subcategoria_actualizado']) ? intval($_POST['subcategoria_actualizado']) : null; // Verifica si está seteada
    $estado = intval($_POST['estado_actualizado']);
    
    // Verifica la conexión
    if ($con) {
        // Verifica si hay datos antes de intentar la actualización
        if (!empty($nombre) && !empty($precio) && !empty($categoria)) {
            // Preparar la consulta SQL utilizando parámetros para evitar SQL Injection
            $sql = "UPDATE productos SET p_nombre=?, p_descripcion=?, p_precio=?, p_categoria=?, p_subcat=?, estado=? WHERE p_id=?";

            // Preparar la consulta
            $stmt = $con->prepare($sql);

            // Verifica si la preparación de la consulta fue exitosa
            if ($stmt) {
                // Vincular los parámetros con la consulta SQL
                $stmt->bind_param("ssdiiii", $nombre, $descripcion, $precio, $categoria, $subcategoria, $estado, $id_producto);

                // Ejecutar la consulta
                $stmt->execute();

                // Verifica si la ejecución de la consulta fue exitosa
                if ($stmt->affected_rows > 0) {
                    $response['success'] = true;
                    $response['message'] = "Producto actualizado";
                } else {
                    $response['message'] = "Realice algun cambio para actualizar el producto" . $stmt->error;
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
