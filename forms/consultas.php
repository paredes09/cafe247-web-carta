<?php
require_once "config.php";
//consulta para llenar el select de categorias
$sql = "SELECT * FROM categoria";
$result = $con->query($sql);
$result2 = $con->query($sql);
$result3 = $con->query($sql);

//consulta para llenar el select de subcategorias
$sqlSub = "SELECT * from subcategoria as sc INNER join categoria as c
on sc.sc_cat=c.c_id";
$resultSub = $con->query($sqlSub);

//consulta para llenar el select de productos por categoria
$sqlProductos = "SELECT *
FROM productos AS p 
INNER JOIN categoria AS c ON p.p_categoria = c.c_id 
LEFT JOIN subcategoria AS sc ON sc.sc_id = p.p_subcat
ORDER BY p_id DESC";
$resultProductos = $con->query($sqlProductos);

// consulta para llenar el select de ofertas
$sqlOfertas = "SELECT * FROM diasoferta as dd INNER JOIN
ofertas as o on dd.o_id=o.o_id INNER JOIN
dias as d on d.d_id=dd.d_id";
$resultOfertas = $con->query($sqlOfertas);
// consulta para obtener los dias de la semana
$sqlDias = "SELECT * FROM dias";
$resultDias = $con->query($sqlDias);
$resultDias2 = $con->query($sqlDias);
// consulta para obtener las ofertas con los dias
$sqlOfertasDias = "SELECT o.o_id,o_titulo,o_precio,GROUP_CONCAT(dd.d_id) id_dias,
GROUP_CONCAT(d_nombre) as dias,o_estado, o_desc,o_condiciones,o_img FROM diasoferta as dd 
INNER JOIN ofertas as o on dd.o_id=o.o_id INNER JOIN dias as d on d.d_id=dd.d_id 
GROUP by o_titulo,o.o_id,o_desc,o_condiciones,o_img;";
$resultOfertasDias = $con->query($sqlOfertasDias);
?>