<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "lr_lcdle";

$con = new mysqli($host,$user,$password,$db);

if ($con->connect_error) {
    die("Fallo la conexion a la base de datos: " . $con->connect_error);
}
$con->set_charset("utf8");
?>