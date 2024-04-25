<?php
require_once '../../../forms/config.php';

// Validar campos obligatorios
if (
    empty($_POST['oferta']) ||
    empty($_POST['o_precio']) ||
    empty($_POST['descripcion'])
){
    // No imprimir nada si hay errores, ya que la validación se manejará en el lado del cliente
    exit;
}
else{
// Continuar con el script solo si todos los campos están presentes
$nombre = htmlspecialchars($_POST['oferta']);
$precio = doubleval($_POST['o_precio']);
$descripcion = htmlspecialchars($_POST['descripcion']);
$condiciones = htmlspecialchars($_POST['condiciones']);
$estado = intval($_POST['estado']);

// Manejo de la subida de archivos (imagen)
$imagen_nombre = $_FILES["imagen"]["name"];
$imagen_temp = $_FILES["imagen"]["tmp_name"];
$imagen_destino = "../../../assets/img/ofertas/" . $imagen_nombre;
$imagenbd = "assets/img/ofertas/" . $imagen_nombre;
// Mueve el archivo temporal al destino final
move_uploaded_file($imagen_temp, $imagen_destino);

// Inicializa la respuesta
$response = array('success' => false, 'message' => 'Error al procesar la inserción.');

// Inserta el registro en la tabla 'ofertas'
$sql = "INSERT INTO ofertas (o_titulo, o_precio, o_desc, o_img, o_condiciones, o_estado) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sdsssi", $nombre, $precio, $descripcion, $imagenbd, $condiciones, $estado);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // Obtén el ID de la oferta recién insertada
    $oferta_id = $stmt->insert_id;

    // Inserta en la tabla 'ofertas_dias'
    if (isset($_POST['dias']) && is_array($_POST['dias'])) {
        foreach ($_POST['dias'] as $dia_id) {
            $sql_dias = "INSERT INTO diasoferta (o_id, d_id) VALUES (?, ?)";
            $stmt_dias = $con->prepare($sql_dias);
            $stmt_dias->bind_param("ii", $oferta_id, $dia_id);
            $stmt_dias->execute();

            if ($stmt_dias->affected_rows <= 0) {
                $response['message'] = 'Error al insertar en la tabla "ofertas_dias": ' . $stmt_dias->error;
                break; // Detén el bucle si hay un error en ofertas_dias
            }
        }
    }

    $response['success'] = true;
    $response['message'] = 'Oferta registrada';
} else {
    $response['message'] = 'Error al registrar la oferta: ' . $stmt->error;
}
// Cierra las conexiones preparadas
$stmt->close();
$stmt_dias->close();
// Imprime la respuesta JSON al final del script
echo json_encode($response);


}
// Cierra la conexión a la base de datos
$con->close();

?>
