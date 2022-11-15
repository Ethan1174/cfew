<?php
error_reporting(0);
require('functMysql.php');
require_once('seguridad.php');
$stmValidar = (isset($_POST["key"]))? $_POST["key"]: "";

if($stmValidar == ""){
 $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}

$rpe = $_SESSION['rpe'];
$sql = "SELECT rpe, nombre, SUBSTRING_INDEX(nombre, ' ', 2) firstName, usuario_scate.id_tipo, activo, area_clave as area, id_depto, depto_nombre, descripcion as tipo, cenco FROM usuario_scate INNER JOIN tipo_scate ON (usuario_scate.id_tipo = tipo_scate.id_tipo) WHERE rpe='" . $rpe . "'";
$resultado = getArraySQL($sql, "usuarios", false);
header('Content-type: application/json; charset=utf-8');
echo json_encode($resultado["data"][0]);
$_SESSION["id_tipo"] = $resultado["data"][0]["id_tipo"];
$_SESSION["area"] = $resultado["data"][0]["area"];
$_SESSION["cenco"] = $resultado["data"][0]["cenco"];

// $sql2 = "SELECT * FROM clase";
// $resultado2 = getArraySQL($sql2, "bmpc", true);