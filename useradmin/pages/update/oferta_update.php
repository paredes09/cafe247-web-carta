<?php
require_once '../../../forms/config.php';

// Validar campo obligatorio (ID de la oferta a actualizar)
if (empty($_POST['id_oferta'])) {
    echo "Error al actualizar la oferta: " . $con->error;
    exit;
} else {
    // Continuar con el script solo si el ID de la oferta está presente
    $oferta_id = intval($_POST['id_oferta']);

    // Validar campos obligatorios para la actualización
    if (
        empty($_POST['oferta_actualizado']) ||
        empty($_POST['o_precio_actualizado']) ||
        empty($_POST['descripcion_actualizado'])
    ){
        // No imprimir nada si hay errores, ya que la validación se manejará en el lado del cliente
        exit;
    }

    // Continuar con la actualización solo si todos los campos están presentes
    $nombre = htmlspecialchars($_POST['oferta_actualizado']);
    $precio = doubleval($_POST['o_precio_actualizado']);
    $descripcion = htmlspecialchars($_POST['descripcion_actualizado']);
    $condiciones = htmlspecialchars($_POST['condiciones_actualizado']);
    $estado = intval($_POST['estado_actualizado']);

    // Obtener la ruta actual de la imagen desde la base de datos
    $sql_obtener_ruta = "SELECT o_titulo, o_precio, o_desc, o_condiciones, o_estado, o_img FROM ofertas WHERE o_id=?";
    $stmt_obtener_ruta = $con->prepare($sql_obtener_ruta);
    $stmt_obtener_ruta->bind_param("i", $oferta_id);
    $stmt_obtener_ruta->execute();
    $stmt_obtener_ruta->bind_result($titulo_actual, $precio_actual, $descripcion_actual, $condiciones_actual, $estado_actual, $ruta_imagen_actual);
    $stmt_obtener_ruta->fetch();
    $stmt_obtener_ruta->close();

    // Verificar si se proporciona un nuevo archivo de imagen
    $imagenbd = $ruta_imagen_actual; // Inicializar con la ruta actual por defecto

    if (!empty($_FILES["imagen2"]["name"])) {
        // Se proporciona un nuevo archivo, compara con la ruta actual
        $imagen_nombre = $_FILES["imagen2"]["name"];
        $imagen_temp = $_FILES["imagen2"]["tmp_name"];
        $imagen_destino = "../../../assets/img/ofertas/" . $imagen_nombre;
        $imagenbd = "assets/img/ofertas/" . $imagen_nombre;

        // Mueve el archivo temporal al destino final
        move_uploaded_file($imagen_temp, $imagen_destino);

        // Agregar mensaje personalizado para nueva imagen en la respuesta JSON
        $mensaje_respuesta = 'Se ha subido una nueva imagen.';
    }

    // Verificar si se realizaron cambios antes de la actualización
    if (
        $nombre === $titulo_actual &&
        $precio === $precio_actual &&
        $descripcion === $descripcion_actual &&
        $condiciones === $condiciones_actual &&
        $estado === $estado_actual &&
        $imagenbd === $ruta_imagen_actual
        // aqui vamos a poner el array de dias para verificar si se realizaron cambios
        
    ) {
        // No se realizaron cambios, enviar respuesta JSON indicando que no se hizo ninguna actualización
        $response['success'] = false;
        $response['message'] = 'No se realizaron cambios.';

        // Imprime la respuesta JSON y finaliza el script
        echo json_encode($response);
        exit;
    }

    // Actualiza el registro en la tabla 'ofertas'
    $sql = "UPDATE ofertas SET o_titulo=?, o_precio=?, o_desc=?, o_img=?, o_condiciones=?, o_estado=? WHERE o_id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sdsssii", $nombre, $precio, $descripcion, $imagenbd, $condiciones, $estado, $oferta_id);
    $stmt->execute();
 

    if ($stmt->affected_rows > 0 ) {

        // Inserta en la tabla 'diasoferta' los nuevos días asociados a esta oferta
        if($_POST['dias2'] <= 0){
            $response['message'] = 'El campo de dias debe estar con un dia de seleccion' .$stmt_delete_dias->error;
        }
        else{
        // Elimina los registros anteriores en la tabla 'diasoferta' asociados a esta oferta
        $sql_delete_dias = "DELETE FROM diasoferta WHERE o_id=?";
        $stmt_delete_dias = $con->prepare($sql_delete_dias);
        $stmt_delete_dias->bind_param("i", $oferta_id);
        $stmt_delete_dias->execute();
        
        if (isset($_POST['dias2']) && is_array($_POST['dias2'])) {
        foreach ($_POST['dias2'] as $dia_id) {

            $sql_dias = "INSERT INTO diasoferta (o_id, d_id) VALUES (?, ?)";
            $stmt_dias = $con->prepare($sql_dias);
            $stmt_dias->bind_param("ii", $oferta_id, $dia_id);
            $stmt_dias->execute();

            if ($stmt_dias->affected_rows <= 0) {
                $response['message'] = 'Error al insertar en la tabla "diasoferta": ' . $stmt_dias->error;
                break; // Detén el bucle si hay un error en diasoferta
            }
        }
        }
        $response['success'] = true;
        $response['message'] = 'Oferta actualizada. ' . $mensaje_respuesta;
        }

    } else {
        $response['message'] = 'Realice algun cambio para actualizar la oferta ' . $stmt->error;
    }
           // Cierra las conexiones preparadas
           $stmt->close();


           // Imprime la respuesta JSON al final del script
           echo json_encode($response);
 
}

// Cierra la conexión a la base de datos
$con->close();
?>
