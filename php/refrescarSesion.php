<?php
error_reporting(0);
require('usuarios.php');
require_once('seguridad.php');
$rpe = $_SESSION['rpe'];
$sql = "SELECT rpe, nombre, usuario_scate.id_tipo, activo, area_clave as area, id_depto, depto_nombre, descripcion as tipo, cenco FROM usuario_scate INNER JOIN tipo_scate ON (usuario_scate.id_tipo = tipo_scate.id_tipo) WHERE rpe='" . $rpe . "'";
$resultado = getArraySQL($sql, "usuarios_mps", false);
header('Content-type: application/json; charset=utf-8');
echo json_encode($resultado["data"]);
$_SESSION["id_tipo"] = $resultado["data"]["id_tipo"];
$_SESSION["area"] = $resultado["data"]["area"];
$_SESSION["cenco"] = $resultado["data"]["cenco"];

// $sql2 = "SELECT * FROM clase";
// $resultado2 = getArraySQL($sql2, "bmpc", true);
