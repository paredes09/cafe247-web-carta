<?php
require_once '../../forms/config.php';

// Obtén el valor de la categoría seleccionada
$categoriaId = intval($_GET['categoria']) ? intval($_GET['categoria']) : 0;

// Ejecuta la consulta SQL para obtener las subcategorías asociadas a la categoría seleccionada
$stmt = $con->prepare("SELECT sc_id,sc_nombre,sc_cat from subcategoria as sc INNER join categoria as c
on sc.sc_cat=c.c_id where sc_cat = ?");
$stmt->bind_param("i", $categoriaId);
$stmt->execute();
$result = $stmt->get_result();

// Construye un array con los resultados
$subcategorias = array();
while ($row = $result->fetch_assoc()) {
    $subcategorias[] = array('id' => $row['sc_id'], 'nombre' => $row['sc_nombre'],'categoria' => $row['sc_cat']);
}

// Devuelve los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($subcategorias);

// Cierra la conexión y la consulta
$stmt->close();
$con->close();
?>
