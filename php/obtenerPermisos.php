<?php
error_reporting(0);
require('functMysql.php');
require_once('seguridad.php');
session_start();
$rpe = $_SESSION['rpe'];
$sql = ("SELECT tipo, agrega, modifica, elimina, consulta FROM permiso WHERE rpe_usuario = '$rpe'");
// $sql = "SELECT agrega, modifica, elimina, consulta FROM permiso WHERE rpe_usuario ='".$rpe."'";
$resultado = getArraySQL($sql, "bmpc", true); // Ese true solo es para que te muestre mas detalles en la consola.
header('Content-type: application/json; charset=utf-8');
// echo json_encode($resultado);
echo json_encode($resultado["data"]);
?>