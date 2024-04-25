<?php

require_once '../../../forms/config.php';

// Obtener datos del formulario
$categori = htmlspecialchars($_POST['categoria']);
$categoria = preg_replace('/\s+/', ' ', $categori);
$cprincipal = intval($_POST['cprin']);
$estado = intval($_POST['estado']);

// Inicializar la respuesta JSON
$response = array('success' => false, 'message' => '');

// Validar los datos del formulario
if (empty($categoria)) {
    $response['message'] = 'El campo "categoria" es obligatorio.';
} else {
    if ($cprincipal == 1) {
        $sql = "INSERT INTO categoria (c_nombre, c_estado) VALUES (?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("si", $categoria, $estado);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Categoria insertada exitosamente
            $response['success'] = true;
            $response['message'] = 'Categoria Registrada';
        } else {
            // Error al insertar la categoria
            $response['message'] = 'Error al insertar la categoria: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        $cpadre = intval($_POST['cp']);
        // Asegúrate de que los tipos de datos sean los correctos y estén en el orden adecuado
        $sql = "INSERT INTO subcategoria (sc_nombre, sc_cat, sc_estado) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sii", $categoria, $cpadre, $estado);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Subcategoria registrada exitosamente
            $response['success'] = true;
            $response['message'] = 'Subcategoria registrada';
        } else {
            // Error al insertar la subcategoria
            $response['message'] = 'Error al insertar la subcategoria: ' . $stmt->error;
        }

        $stmt->close();
    }
}

// Cerrar la conexión a la base de datos
$con->close();

// Enviar la respuesta JSON al cliente solo si hay éxito
if ($response['success']) {
    echo json_encode($response);
}
?>
